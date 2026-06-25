<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Artikel extends BaseController
{
    public function index()
    {
        $model       = new ArtikelModel();
        $kategori_id = $this->request->getVar('kategori_id') ?? '';
        $q           = $this->request->getVar('q') ?? '';

        $builder = $model->select('artikel.*, kategori.nama_kategori, kategori.slug_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->where('artikel.status', 1)
            ->orderBy('artikel.created_at', 'DESC')
            ->orderBy('artikel.id', 'DESC');

        if ($q !== '') {
            $builder->groupStart()
                ->like('artikel.judul', $q)
                ->orLike('artikel.isi', $q)
                ->groupEnd();
        }

        if ($kategori_id !== '') {
            $builder->where('artikel.id_kategori', $kategori_id);
        }

        $kategoriModel = new KategoriModel();

        $data = [
            'title'       => 'Forum Artikel Manchester United',
            'q'           => $q,
            'kategori_id' => $kategori_id,
            'artikel'     => $builder->paginate(6),
            'pager'       => $model->pager,
            'kategori'    => $kategoriModel->findAll(),
        ];

        return view('artikel/index', $data);
    }

    public function view($slug)
    {
        $model = new ArtikelModel();
        $artikel = $model->select('artikel.*, kategori.nama_kategori, kategori.slug_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->where('artikel.slug', $slug)
            ->first();

        if (! $artikel) {
            throw PageNotFoundException::forPageNotFound('Artikel tidak ditemukan.');
        }

        return view('artikel/detail', [
            'title'   => $artikel['judul'],
            'artikel' => $artikel,
        ]);
    }

    public function admin_index()
    {
        $title       = 'Daftar Artikel MU Forum (Admin)';
        $model       = new ArtikelModel();
        $q           = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? '';
        $page        = (int) ($this->request->getVar('page') ?? 1);

        $builder = $model->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->orderBy('artikel.created_at', 'DESC')
            ->orderBy('artikel.id', 'DESC');

        if ($q !== '') {
            $builder->groupStart()
                ->like('artikel.judul', $q)
                ->orLike('artikel.isi', $q)
                ->groupEnd();
        }

        if ($kategori_id !== '') {
            $builder->where('artikel.id_kategori', $kategori_id);
        }

        $artikel = $builder->paginate(10, 'default', $page);
        $pager   = $model->pager;

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'title'        => $title,
                'q'            => $q,
                'kategori_id'  => $kategori_id,
                'artikel'      => $artikel,
                'pager_links'  => $pager->links(),
            ]);
        }

        $kategoriModel = new KategoriModel();

        return view('artikel/admin_index', [
            'title'       => $title,
            'q'           => $q,
            'kategori_id' => $kategori_id,
            'artikel'     => $artikel,
            'pager'       => $pager,
            'kategori'    => $kategoriModel->findAll(),
        ]);
    }

    public function add()
    {
        helper(['form', 'url', 'text']);

        $kategoriModel = new KategoriModel();

        if (strtolower($this->request->getMethod()) === 'post' && $this->validate([
            'judul'       => 'required|min_length[3]',
            'id_kategori' => 'required|integer',
        ])) {
            $file       = $this->request->getFile('gambar');
            $namaGambar = 'default.svg';

            if ($file && $file->isValid() && ! $file->hasMoved()) {
                $namaGambar = $file->getRandomName();
                $file->move(ROOTPATH . 'public/gambar', $namaGambar);
            }

            $artikel = new ArtikelModel();
            $judul   = $this->request->getPost('judul');

            $artikel->insert([
                'judul'        => $judul,
                'isi'          => $this->request->getPost('isi'),
                'slug'         => url_title($judul, '-', true),
                'status'       => (int) $this->request->getPost('status'),
                'is_terbaru'   => $this->request->getPost('is_terbaru') ? 1 : 0,
                'gambar'       => $namaGambar,
                'id_kategori'  => (int) $this->request->getPost('id_kategori'),
                'sumber_nama'  => $this->request->getPost('sumber_nama'),
                'sumber_url'   => $this->request->getPost('sumber_url'),
            ]);

            return redirect()->to('/admin/artikel');
        }

        return view('artikel/form_add', [
            'title'    => 'Tambah Artikel MU Forum',
            'kategori' => $kategoriModel->findAll(),
        ]);
    }

    public function edit($id)
    {
        helper(['form', 'url', 'text']);

        $model         = new ArtikelModel();
        $kategoriModel = new KategoriModel();
        $artikel       = $model->find($id);

        if (! $artikel) {
            throw PageNotFoundException::forPageNotFound('Artikel tidak ditemukan.');
        }

        if (strtolower($this->request->getMethod()) === 'post' && $this->validate([
            'judul'       => 'required|min_length[3]',
            'id_kategori' => 'required|integer',
        ])) {
            $file       = $this->request->getFile('gambar');
            $namaGambar = $artikel['gambar'] ?: 'default.svg';

            if ($file && $file->isValid() && ! $file->hasMoved()) {
                $namaGambar = $file->getRandomName();
                $file->move(ROOTPATH . 'public/gambar', $namaGambar);
            }

            $judul = $this->request->getPost('judul');

            $model->update($id, [
                'judul'        => $judul,
                'isi'          => $this->request->getPost('isi'),
                'slug'         => url_title($judul, '-', true),
                'status'       => (int) $this->request->getPost('status'),
                'is_terbaru'   => $this->request->getPost('is_terbaru') ? 1 : 0,
                'gambar'       => $namaGambar,
                'id_kategori'  => (int) $this->request->getPost('id_kategori'),
                'sumber_nama'  => $this->request->getPost('sumber_nama'),
                'sumber_url'   => $this->request->getPost('sumber_url'),
            ]);

            return redirect()->to('/admin/artikel');
        }

        return view('artikel/form_edit', [
            'title'    => 'Edit Artikel MU Forum',
            'artikel'  => $artikel,
            'kategori' => $kategoriModel->findAll(),
        ]);
    }


    public function toggleTerbaru($id)
    {
        $model   = new ArtikelModel();
        $artikel = $model->find($id);

        if (! $artikel) {
            throw PageNotFoundException::forPageNotFound('Artikel tidak ditemukan.');
        }

        $model->update($id, [
            'is_terbaru' => ((int) ($artikel['is_terbaru'] ?? 0) === 1) ? 0 : 1,
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        $model = new ArtikelModel();
        $model->delete($id);

        return redirect()->to('/admin/artikel');
    }
}
