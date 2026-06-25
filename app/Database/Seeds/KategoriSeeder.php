<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $model = model('KategoriModel');
        $data = [
            ['id_kategori' => 1, 'nama_kategori' => 'Sejarah', 'slug_kategori' => 'sejarah'],
            ['id_kategori' => 2, 'nama_kategori' => 'Manajer', 'slug_kategori' => 'manajer'],
            ['id_kategori' => 3, 'nama_kategori' => 'Pemain', 'slug_kategori' => 'pemain'],
            ['id_kategori' => 4, 'nama_kategori' => 'Trofi', 'slug_kategori' => 'trofi'],
            ['id_kategori' => 5, 'nama_kategori' => 'Berita Lapangan', 'slug_kategori' => 'berita-lapangan'],
            ['id_kategori' => 6, 'nama_kategori' => 'Berita Luar Lapangan', 'slug_kategori' => 'berita-luar-lapangan'],
            ['id_kategori' => 7, 'nama_kategori' => 'Transfer', 'slug_kategori' => 'transfer'],
            ['id_kategori' => 8, 'nama_kategori' => 'Akademi', 'slug_kategori' => 'akademi'],
            ['id_kategori' => 9, 'nama_kategori' => 'United Women', 'slug_kategori' => 'united-women'],
        ];

        foreach ($data as $row) {
            if (! $model->find($row['id_kategori'])) {
                $model->insert($row);
            }
        }
    }
}
