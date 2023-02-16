<?php echo $this->extend('layout/main');?>
<?php echo $this->section('titulo');
echo $titulo;
?>
<?php echo $this->endSection()?>

<?php echo $this->section('estilos')?>
<?php echo $this->endSection()?>

<?php echo $this->section('conteudo')?>

<?php echo $this->endSection()?>

<?php echo $this->section('scripts')?>
<?php echo $this->endSection()?>