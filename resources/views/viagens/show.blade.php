@extends('layouts.template')
@section('title', 'Mostrar Viagem')
@section('content')

<?php 
@session_start();
if(@$_SESSION['id_usuario']==null){
    echo "<script language='javascript'> window.location='/' </script>";
}
?>


<div class="jumbotron">
  <h1 class="display-4"><?php echo $viagem->nome; ?> </h1>
  <p class="lead"> O motorista <?php echo $viagem->motorista; ?> , usou o carro com a placa <?php echo $viagem->placa; ?>. </p>
  <hr class="my-4">
  
  <a class="btn btn-primary " href="{{route('viagens')}}" role="button">Ver Viagens</a>
  
</div>
@endsection