<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = model('UserModel');

        if (! $model->where('useremail', 'admin@email.com')->first()) {
            $model->insert([
                'username'     => 'admin',
                'useremail'    => 'admin@email.com',
                'userpassword' => password_hash('admin123', PASSWORD_DEFAULT),
            ]);
        }
    }
}
