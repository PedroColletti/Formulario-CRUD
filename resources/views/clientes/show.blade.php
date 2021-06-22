@extends('layouts.template')
@section('title', 'Clientes')
@section('content')

<?php 
@session_start();
if(@$_SESSION['id_usuario']==null){
    echo "<script language='javascript'> window.location='/' </script>";
}
?>

<div class="jumbotron">
  
  <h1 class="display-4"><?php echo $cliente->CLI_NOME; ?> </h1>
  <p class="lead"> RG número <?php echo $cliente->CLI_RG; ?>.</p>
  <hr class="my-4">

  <a class="btn btn-primary" href="{{route('clientes')}}" role="button">Ver Clientes</a>
  
</div>

@endsection