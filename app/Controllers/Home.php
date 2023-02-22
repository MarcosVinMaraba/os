<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'titulo'=>'Entrar'
        ];
        
        return view('login',$data);
    }
}
