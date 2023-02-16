<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriaTabelaUser extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nome' => [
                'type' => 'varchar',
                'constraint' => '200',
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => '240',
            ],
            'password_hash' => [
                'type' => 'varchar',
                'constraint' => '240',
            ],
            'reset_hash' => [
                'type' => 'varchar',
                'constraint' => '80',
                'null'=>true,
                'default'=>null
            ],
            'reset_expira_em' => [
                'type' => 'datetime',
                'null'=>true,
                'default'=>null
            ],
            'imagem' => [
                'type' => 'varchar',
                'constraint'=>'240',
                'null'=>true,
                'default'=>true
            ],
            'ativo' => [
                'type' => 'boolean',
                'null'=>true
                
            ],
            'criado_em' => [
                'type' => 'datetime',
                'null'=>true,
                'default'=>null
            ],
            'atualizado_em' => [
                'type' => 'datetime',
                'null'=>true,
                'default'=>null
            ],
            'deletado_em' => [
                'type' => 'datetime',
                'null'=>true,
                'default'=>null
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
    $this->forge->dropTable('usuarios'); 
    }
}
