<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class Auth extends ResourceController
{
    protected $format = 'json';

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

    public function login()
    {
        $this->cors();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        if (! $username || ! $password) {
            return $this->failUnauthorized('Username/email dan password wajib diisi.');
        }

        $model = new UserModel();
        $user = $model->groupStart()
            ->where('username', $username)
            ->orWhere('useremail', $username)
            ->groupEnd()
            ->first();

        if ($user) {
            $storedPassword = $user['userpassword'] ?? '';
            $isPasswordValid = password_verify($password, $storedPassword) || $password === $storedPassword;

            if ($isPasswordValid) {
                $payload = [
                    'type'     => 'TOKEN-SECRET-MU-FORUM',
                    'id'       => (int) $user['id'],
                    'username' => $user['username'],
                    'email'    => $user['useremail'],
                    'iat'      => time(),
                ];

                return $this->respond([
                    'status'   => 200,
                    'error'    => null,
                    'messages' => 'Login Berhasil',
                    'data'     => [
                        'id'       => (int) $user['id'],
                        'username' => $user['username'],
                        'email'    => $user['useremail'],
                        'token'    => base64_encode(json_encode($payload)),
                    ],
                ], 200);
            }
        }

        return $this->failUnauthorized('Username atau Password yang Anda masukkan salah.');
    }
}
