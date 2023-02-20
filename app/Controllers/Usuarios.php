<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    private $userTable;
    function __construct()
    {
        $this->userTable = new UsuariosModel();
    }
    public function index()
    {
        // 
       
      $ad=new  \App\Database\Seeds\UsuariosFakerSeeder();
      $ad->run();

    }
}
