<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Database as DatabaseDatabase;
use CodeIgniter\Database\Seeder;
use Config\Database;
use Faker\Factory;
class UsuariosFakerSeeder extends Seeder
{
    public function run()
    {
        //
        
       
    
        $usuarioModel = new \App\Models\UsuariosModel();
        $faker = Factory::create();
        $qtdUsuariosCriar = 50;
        $usuariosPush = [];
        for ($i = 0; $i < $qtdUsuariosCriar; $i++) {
            # code...
            array_push($usuariosPush, [
                'nome' => $faker->unique()->name(),
                'email' => $faker->unique()->email(),
                'password_hash' => '123456',
                'ativo' => true,

            ]);
        }
        echo '<pre>';
        print_r($usuariosPush);
        exit;
    }
}
