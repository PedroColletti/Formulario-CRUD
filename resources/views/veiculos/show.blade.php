@extends('layouts.template')
@section('title', 'Veiculo')
@section('content')

<?php 
@session_start();
if(@$_SESSION['id_usuario']==null){
    echo "<script language='javascript'> window.location='/' </script>";
}
?>


<div class="jumbotron">
  <h1 class="display-4"><?php echo $veiculo->nome; ?> </h1>
  <p class="lead"> Cor <?php echo $veiculo->cor; ?>, com a placa    <?php echo $veiculo->placa; ?>.</p>
  <hr class="my-4">

  <a class="btn btn-primary btn-lg" href="{{route('veiculos')}}" role="button">Ver veiculos</a>
  
  
</div>
@endsection