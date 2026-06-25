<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class ApiAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $authHeader = $request->getHeaderLine('Authorization');

        if (! $authHeader) {
            $authHeader = $request->getServer('HTTP_AUTHORIZATION')
                ?: $request->getServer('REDIRECT_HTTP_AUTHORIZATION');
        }

        if (! $authHeader) {
            return $this->unauthorized('Akses Ditolak. Token tidak ditemukan pada request!');
        }

        $token = null;
        if (preg_match('/Bearer\s+(\S+)/', $authHeader, $matches)) {
            $token = $matches[1];
        }

        if (! $token || ! $this->isValidToken($token)) {
            return $this->unauthorized('Sesi Token tidak valid atau kedaluwarsa!');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak diperlukan aksi setelah request diproses.
    }

    private function isValidToken(string $token): bool
    {
        $decoded = base64_decode($token, true);

        if ($decoded === false || trim($decoded) === '') {
            return false;
        }

        $payload = json_decode($decoded, true);
        if (is_array($payload)) {
            return ($payload['type'] ?? '') === 'TOKEN-SECRET-MU-FORUM'
                && ! empty($payload['username'])
                && ! empty($payload['id']);
        }

        // Kompatibilitas dengan contoh token sederhana pada modul.
        return strpos($decoded, 'TOKEN-SECRET-') === 0;
    }

    private function unauthorized(string $message)
    {
        $response = Services::response();
        $response->setStatusCode(401);
        $response
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Accept, Origin, Authorization')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS');

        return $response->setJSON([
            'status'   => 401,
            'error'    => 401,
            'messages' => $message,
        ]);
    }
}
