<?php echo $this->extend('layout/main');?>
<?php echo $this->section('titulo');
echo $titulo;
?>
<?php echo $this->endSection()?>

<?php echo $this->section('estilos')?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.2/r-2.4.0/datatables.min.css"/>
 

<?php echo $this->endSection()?>

<?php echo $this->section('conteudo')?>
   <div class='row'>
   <div class="col-lg-12">
                <div class="block">
                  <div class="title"><strong>Compact Table</strong></div>
                  <div class="table-responsive"> 
                    <table id="tb-usuarios" class="table table-striped table-sm">
                      <thead>
                        <tr>
                          
                          <th>Imagem</th>
                          <th>Nome</th>
                          <th>Email</th>
                          <th>Situação</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
   </div>

<?php echo $this->endSection()?>

<?php echo $this->section('scripts')?>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.13.2/r-2.4.0/datatables.min.js"></script>
<script>



  $(document).ready(function () {
    $('#tb-usuarios').DataTable({
      
        ajax: '<?php echo site_url('Usuarios/recuperausuarios') ?>',
        columns: [
            { data: 'imagem' },
            { data: 'nome' },
            { data: 'email' },
            { data: 'ativo' },
           
        ],
        processing: true,
        language: {
            url: '<?php echo site_url('recursos/pt_br.json') ?>',
            processing: 'Processando...',
        },
        deferRender: true,
        responsive:true,
        pagingType:$(window).width()< 768?'simple': 'simple_numbers',
        
    });
});
</script>


<?php echo $this->endSection()?>