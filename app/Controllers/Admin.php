<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        $artikelModel = new ArtikelModel();

        $latest = $artikelModel->getArtikelTerbaru(5);

        return view('admin/dashboard', [
            'title'        => 'Dashboard Admin MU Forum',
            'totalArtikel' => (new ArtikelModel())->countAllResults(),
            'publish'      => (new ArtikelModel())->where('status', 1)->countAllResults(),
            'draft'        => (new ArtikelModel())->where('status', 0)->countAllResults(),
            'terbaru'      => (new ArtikelModel())->where('is_terbaru', 1)->countAllResults(),
            'kategori'     => (new KategoriModel())->countAllResults(),
            'user'         => (new UserModel())->countAllResults(),
            'latest'       => $latest,
        ]);
    }
}
