<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ArtikelModel;

class Post extends ResourceController
{
    use ResponseTrait;

    private function cors(): void
    {
        $this->response
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Accept, Origin, Authorization')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS');
    }

    public function options()
    {
        $this->cors();
        return $this->response->setStatusCode(200);
    }

    private function inputData(): array
    {
        $json = $this->request->getJSON(true);
        if (is_array($json)) {
            return $json;
        }

        $raw = $this->request->getRawInput();
        if (is_array($raw) && $raw !== []) {
            return $raw;
        }

        $post = $this->request->getPost();
        return is_array($post) ? $post : [];
    }

    private function prepareData(array $input, bool $isUpdate = false): array
    {
        helper(['url', 'text']);

        $fields = ['judul', 'isi', 'status', 'is_terbaru', 'id_kategori', 'sumber_nama', 'sumber_url'];
        $data = [];

        foreach ($fields as $field) {
            if (array_key_exists($field, $input)) {
                $data[$field] = $input[$field];
            }
        }

        if (isset($data['judul']) && $data['judul'] !== '') {
            $data['slug'] = url_title($data['judul'], '-', true);
        }

        if (! $isUpdate && ! isset($data['gambar'])) {
            $data['gambar'] = 'default.svg';
        }

        if (! isset($data['id_kategori']) || $data['id_kategori'] === '') {
            $data['id_kategori'] = 7; // default Transfer
        }

        if (! isset($data['status']) || $data['status'] === '') {
            $data['status'] = 1;
        }

        if (! isset($data['is_terbaru']) || $data['is_terbaru'] === '') {
            $data['is_terbaru'] = 0;
        }

        return $data;
    }

    // all posts
    public function index()
    {
        $this->cors();
        $model = new ArtikelModel();
        $data['artikel'] = $model->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->orderBy('artikel.id', 'DESC')
            ->findAll();

        return $this->respond($data);
    }

    // create
    public function create()
    {
        $this->cors();
        $model = new ArtikelModel();
        $input = $this->inputData();
        $data  = $this->prepareData($input);

        if (empty($data['judul'])) {
            return $this->failValidationErrors('Judul wajib diisi.');
        }

        $model->insert($data);

        return $this->respondCreated([
            'status'   => 201,
            'error'    => null,
            'messages' => ['success' => 'Data artikel berhasil ditambahkan.'],
        ]);
    }

    // single post
    public function show($id = null)
    {
        $this->cors();
        $model = new ArtikelModel();
        $data = $model->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->where('artikel.id', $id)
            ->first();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound('Data tidak ditemukan.');
    }

    // update
    public function update($id = null)
    {
        $this->cors();
        $model = new ArtikelModel();
        $input = $this->inputData();
        $data  = $this->prepareData($input, true);
        $id    = $input['id'] ?? $id;

        if (! $id || ! $model->find($id)) {
            return $this->failNotFound('Data tidak ditemukan.');
        }

        if (empty($data['judul'])) {
            unset($data['slug']);
        }

        $model->update($id, $data);

        return $this->respond([
            'status'   => 200,
            'error'    => null,
            'messages' => ['success' => 'Data artikel berhasil diubah.'],
        ]);
    }

    // delete
    public function delete($id = null)
    {
        $this->cors();
        $model = new ArtikelModel();

        if (! $id || ! $model->find($id)) {
            return $this->failNotFound('Data tidak ditemukan.');
        }

        $model->delete($id);

        return $this->respondDeleted([
            'status'   => 200,
            'error'    => null,
            'messages' => ['success' => 'Data artikel berhasil dihapus.'],
        ]);
    }
}
