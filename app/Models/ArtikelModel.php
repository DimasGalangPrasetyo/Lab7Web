<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table            = 'artikel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'judul',
        'isi',
        'status',
        'is_terbaru',
        'slug',
        'gambar',
        'id_kategori',
        'sumber_nama',
        'sumber_url',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getArtikelDenganKategori(?int $limit = null): array
    {
        $builder = $this->select('artikel.*, kategori.nama_kategori, kategori.slug_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->where('artikel.status', 1)
            ->orderBy('artikel.created_at', 'DESC')
            ->orderBy('artikel.id', 'DESC');

        if ($limit !== null) {
            $builder->limit($limit);
        }

        return $builder->findAll();
    }

    public function getArtikelTerbaru(?int $limit = null): array
    {
        $builder = $this->select('artikel.*, kategori.nama_kategori, kategori.slug_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->where('artikel.status', 1)
            ->where('artikel.is_terbaru', 1)
            ->orderBy('artikel.updated_at', 'DESC')
            ->orderBy('artikel.id', 'DESC');

        if ($limit !== null) {
            $builder->limit($limit);
        }

        return $builder->findAll();
    }
}
