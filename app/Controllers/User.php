<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $title = 'Daftar User';
        $model = new UserModel();
        $users = $model->findAll();

        return view('user/index', compact('users', 'title'));
    }

    public function login()
    {
        helper(['form']);
        $session = session();

        if ($session->get('logged_in') && strtolower($this->request->getMethod()) !== 'post') {
            return redirect()->to('/admin');
        }

        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('user/login', ['title' => 'Login Admin MU Forum']);
        }

        $email    = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');
        $model    = new UserModel();
        $login    = $model->where('useremail', $email)->first();

        if (! $login) {
            $session->setFlashdata('flash_msg', 'Email admin tidak terdaftar. Cek seeder/database.sql terlebih dahulu.');
            return redirect()->to('/admin/login')->withInput();
        }

        if (! password_verify($password, $login['userpassword'])) {
            $session->setFlashdata('flash_msg', 'Password admin salah. Default: admin123.');
            return redirect()->to('/admin/login')->withInput();
        }

        $session->regenerate();
        $session->set([
            'user_id'    => $login['id'],
            'user_name'  => $login['username'],
            'user_email' => $login['useremail'],
            'logged_in'  => true,
        ]);

        return redirect()->to('/admin');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
