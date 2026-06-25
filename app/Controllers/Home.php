<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Home extends BaseController
{
    public function index()
    {
        $artikelModel  = new ArtikelModel();
        $kategoriModel = new KategoriModel();

        $data = [
            'title'    => 'MU Forum - Red Devils Indonesia',
            'artikel'  => $artikelModel->getArtikelTerbaru(6),
            'kategori' => $kategoriModel->findAll(),
        ];

        return view('home', $data);
    }
}
