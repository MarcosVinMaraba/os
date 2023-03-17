<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
   
    protected $table            = 'usuarios';
   

    protected $returnType       = 'App\Entities\Usuarios';
    protected $useSoftDeletes   = true;
    
    protected $allowedFields    = [
        'nome',
        'email',
        'password',
        'reset_hash',
        'reset_expira_em',
        'imagem'
    ];

    // Dates
    protected $useTimestamps = true;
  
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
  

    // Callbacks
   
    protected $beforeInsert   = [];
    
    protected $beforeUpdate   = [];
  
}
