<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;

use function PHPUnit\Framework\returnSelf;

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

    $data = [
      'titulo' => 'Usuários do Sistema'
    ];
    return view('usuarios/index', $data);
  }

  public function recuperaUsuarios()
  {
    /*if(!$this->request->isAJAX()){
        return redirect()->back();
      }*/

    $atributos = [
      'id',
      'nome',
      'email',
      'ativo',
      'imagem'
    ];
    $usuarios = $this->userTable->select($atributos)->findAll();
    $data = [];
    //dd($usuarios);
    foreach ($usuarios as $usuario) {
      # code...
      $data[] = [
        'imagem' => $usuario->imagem,
        'nome' => anchor("usuarios/exibir/" . $usuario->id, esc($usuario->nome), "title='exibir usuário " . esc($usuario->nome) . "'"),
        'email' => $usuario->email,
        'ativo' => ($usuario->ativo == true ? 'Ativo' : "<span style='color:red'>Inativo</span>")
      ];
    }
    $retorno = [
      'data' => $data
    ];
    return $this->response->setJSON($retorno);
  }

  public function exibir(int $id = null)
  {
    $usuario = $this->buscaUsuarioOu404($id);
    $dados = [
      'titulo' => "Detalhe do usuário",
      'usuario' => $usuario
    ];
    return view('usuarios/exibir', $dados);
  }

  public function buscaUsuarioOu404(int $id = null)
  {
    $usuarios = $this->userTable->withDeleted(true)->find($id);

    if ($id == null || empty($usuarios)) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Oooh, não encontrei o usuário :(");
    }
    return $usuarios;
  }

  public function autenticacaoUser(){
    echo 'hello';
    exit;
  }
}
