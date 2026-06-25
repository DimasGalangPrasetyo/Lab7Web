<?php

namespace App\Cells;

use App\Models\ArtikelModel;

class ArtikelTerkini
{
    public function render(): string
    {
        $model = new ArtikelModel();
        $artikel = $model->getArtikelTerbaru(5);

        return view('components/artikel_terkini', ['artikel' => $artikel]);
    }
}
