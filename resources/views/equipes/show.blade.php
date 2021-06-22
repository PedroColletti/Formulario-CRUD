@extends('layouts.template')
@section('title', 'Equipe')
@section('content')

<?php 
@session_start();
if(@$_SESSION['id_usuario']==null){
    echo "<script language='javascript'> window.location='/' </script>";
}
?>

<div class="jumbotron">
  <h1 class="display-4"><?php echo $equipe->nome; ?> </h1>
  <p class="lead"> Equipe <?php echo $equipe->nome; ?></p>
  <hr class="my-4">
  <p> <?php echo $equipe->descricao; ?></p>
  <a class="btn btn-primary" href="{{route('equipes')}}" role="button">Ver Equipes</a>
  
</div>
@endsection