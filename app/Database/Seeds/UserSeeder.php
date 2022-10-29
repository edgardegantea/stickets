<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user_object = new UserModel();

        $user_object->insertBatch([
            [
                "name" => "Edgar Degante Aguilar",
                "email" => "edgar@mail.com",
                "phone_no" => "2311234567",
                "role" => "admin",
                "password" => password_hash("12345678", PASSWORD_DEFAULT)
            ],
            [
                "name" => "Usuario de prueba",
                "email" => "usuario@mail.com",
                "phone_no" => "2311234566",
                "role" => "editor",
                "password" => password_hash("12345678", PASSWORD_DEFAULT)
            ]
        ]);
    }
}
