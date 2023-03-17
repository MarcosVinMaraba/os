<?php

use App\Controllers\Usuarios;

echo $this->extend('layout/main'); ?>
<?php echo $this->section('titulo');
echo $titulo;
?>
<?php echo $this->endSection() ?>

<?php echo $this->section('estilos') ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.2/r-2.4.0/datatables.min.css" />


<?php echo $this->endSection() ?>

<?php echo $this->section('conteudo') ?>
<div class='row'>
    <div class="col-lg-4">
        <div class="block">
            <div class="text-center">
                <?php if ($usuario->imagem == null) : ?>
                    <img src='<?php echo site_url('recursos/img/Profile.png') ?>' class="card-img-top" width="60" />
                <?php endif ?>
                <img src='<?php echo site_url('recursos/img/Profile.png') ?>' class="card-img-top" width="60" />

            </div>

            <button type="button" class="btn btn-outline-primary btn-sm">Alterar</button>
           <a href="<?php echo url_to('usuarios')?>"> <button type="button" class="btn btn-outline-gray btn-sm">voltar</button></a>
            <hr class="bg-secondary">
            <h5 class='card-title mt-2'>Nome: <?php echo $usuario->nome ?></h5>
            <p class='card-text'>Email: <?php echo $usuario->email ?></p>
            <p class='card-text'>Criado: <?php echo $usuario->created_at->humanize() ?></p>
            <p class='card-text'>Atualizado: <?php echo $usuario->updated_at->humanize() ?></p>

            <div class="dropdown">
                <a class="btn btn-danger dropdown-toggle btn-sm" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Ações
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo url_to('editarUsuarios',$usuario->id) ?>">Editar</a>
                    <a class="dropdown-item" href="<?php echo url_to('excluirUsuarios', $usuario->id) ?>">Excluir</a>
                    
                </div>
            </div>
        </div>
    </div>

    <?php echo $this->endSection() ?>

    <?php echo $this->section('scripts') ?>

    <script>




    </script>


    <?php echo $this->endSection() ?>