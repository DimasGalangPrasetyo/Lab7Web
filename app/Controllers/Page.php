<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function about()
    {
        return view('page/about', ['title' => 'Tentang MU Forum']);
    }

    public function contact()
    {
        return view('page/contact', ['title' => 'Kontak MU Forum']);
    }

    public function faqs()
    {
        return view('page/faqs', ['title' => 'FAQ MU Forum']);
    }
}
