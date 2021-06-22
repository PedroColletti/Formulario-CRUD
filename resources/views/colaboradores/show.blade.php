@extends('layouts.template')
@section('title', 'Colaborador')
@section('content')


<?php 
@session_start();
if(@$_SESSION['id_usuario']==null){
    echo "<script language='javascript'> window.location='/' </script>";
}
?>

<div class="jumbotron">
  
  <h1 class="display-4"><?php echo $colaborador->nome; ?> </h1>
  <p class="lead"> Nasceu em <?php echo $colaborador->data_de_nascimento; ?> e ganha  R$  <?php echo $colaborador->salario; ?> por mês. </p>
  <hr class="my-4">
  <a class="btn btn-primary" href="{{route('colaboradores')}}" role="button">Ver Colaboradores</a>
  
</div>

@endsection