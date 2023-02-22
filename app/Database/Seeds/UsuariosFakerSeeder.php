<?php

namespace App\Database\Seeds;

use App\Models\UsuariosModel;
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
        $faker = \Faker\Factory::create();
        $qtdUsuariosCriar = 20000;
        $usuariosPush = [];
        for ($i = 0; $i < $qtdUsuariosCriar; $i++) {
            # code...
            array_push($usuariosPush, [
                'nome' => $faker->unique()->name(),
                'email' => $faker->unique()->email(),
                'password_hash' => '123456',
                'ativo' => $faker->numberBetween(0,1),

            ]);
            
        }
        $usuarioModel->skipValidation(true)->protect(false)->insertBatch($usuariosPush);

        echo $qtdUsuariosCriar.' criado com sucesso';

        
    }
}
