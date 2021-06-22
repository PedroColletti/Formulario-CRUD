@extends('layouts.template')
@section('title', 'Equipes')
@section('content')

<?php 
@session_start();
if(@$_SESSION['id_usuario']==null){
    echo "<script language='javascript'> window.location='/' </script>";
}
?>

<div class="container mt-4">
    <form method="POST" action="{{route('equipes.editar', $equipe)}}">
        @csrf
        @method('put')


        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <label for="exampleInputEmail1"><b>Nome da equipe:</b></label>
                    <input type="text" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" title="Apenas letras" class="form-control" id="" name="nome" value="{{$equipe->nome}}" required>
                </div>
            </div>

            <!-- Descricao campo -->

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Descrição:</b></label>
                    <input type="text" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ . () ]+$" title="Apenas letras" class="form-control" id="" name="descricao" value="{{$equipe->descricao}}" required><br>
                </div>
            </div>
            
            <!-- Status Radio, checked deixa marcado predefinido -->
            <div class="col-md-4">
                <label for="exampleInputEmail1"><b>Status:</b></label>
                <select id="exampleInputEmail1" name="status" required>
                    <?php if ($equipe->status == "A") { ?>
                        <option value="{{$equipe->status}}"selected>Ativo</option>
                        <option value="I">Inativo</option>
                    <?php } else { ?>
                        <option value="{{$equipe->status}}">Inativo</option>
                        <option value="A">Ativo</option>
                    <?php } ?>
                </select>
            </div>
            </div>


        <button type="submit" class="btn btn-primary">Enviar</button>
        <a class="btn btn-primary" href="{{route('equipes')}}" role="button">Voltar</a>
        </form>
</div>

@endsection