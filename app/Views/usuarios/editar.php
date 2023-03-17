<?php

use App\Controllers\Usuarios;

echo $this->extend('layout/main'); ?>
<?php echo $this->section('titulo');
echo $titulo;
?>
<?php echo $this->endSection() ?>

<?php echo $this->section('estilos') ?>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.13.2/r-2.4.0/datatables.min.css"/>


<?php echo $this->endSection() ?>

<?php echo $this->section('conteudo') ?>
    <div class='row'>
        <div class="col-lg-4">
            <div class="block">
                <div class="block-body">
                    <div id="response">

                    </div>
                    <?php echo form_open(url_to('atualizarUsuarios'), ['id' => 'form'], ['id' => $usuario->id]) ?>
                    <?php echo csrf_field() ?>
                    <?php echo $this->include('layout/_form') ?>
                    <div class="form-group mt-5 mb-2">
                        <input id="btn-salvar" type="submit" value="Salvar" class="btn btn-danger mr-2">

                        <?php echo form_close() ?>
                        <a href="<?php echo url_to('exibiUsuarios', $usuario->id) ?>" class="btn btn-secondary ml-2">Voltar </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php echo $this->endSection() ?>

<?php echo $this->section('scripts') ?>

    <script>
        $(document).ready(function () {
            $("#form").on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'post',
                    url: "<?php  echo url_to('atualizarUsuarios') ?>",
                    data: new FormData(this),
                    dataType: 'json',
                    cache: false,
                    processData: false,
                    beforeSend: function (jqXHR) {
                        $('#response').html('');
                        $("#btn-salvar").val('Aguarde...');
                    },
                    success: function (resposta) {
                        $("#btn-salvar").val('Salvar');
                        $("#btn-salvar").removeAttr('disabled');

                        if (resposta.erros) {
                            $('#response').html('<div class="alert alert-danger" role="alert">' + resposta.erros + '</div>');
                            if (resposta.erros_model) {
                                $.each(resposta.erros_model, function (key, value) {
                                    $('#response').append('<ul class="list-unstyled"><li class="text-danger">' + value + '</li></ul>');
                                });
                        }else {
                            //window.location.href = '<?php echo url_to('exibiUsuarios', $usuario->id) ?>';

                        }
                    }},
                    error: function () {
                        alert("Não foi possível processsar a solicitação, favor entrar em contato com suporte técnico");
                        $("#btn-salvar").val('Salvar');
                    }
                })
            })
        })

    </script>


<?php echo $this->endSection() ?>