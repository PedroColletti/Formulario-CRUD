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
    <form method="POST" action="{{route('equipes.insert')}}">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <label for="exampleInputEmail1"><b>Nome da equipe</b></label>
                    <input type="text" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" title="Apenas letras" class="form-control" id="" name="nome" required>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Status:</b></label>
                        <select id="exampleInputEmail1"  name="status" required>
                        <option value="" selected > Escolha a equipe </option>
                        <option  value="A">Ativo</option>
                        <option  value="I">Inativo</option>
                        </select>
                </div>
            </div>


  
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><b>Descrição</b></label>
                        <input type="text" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ () .]+$" title="Apenas letras" class="form-control" id="" name="descricao" required>
                    </div>
                </div>
            </div>
    


        <button type="submit" class="btn btn-primary">Enviar</button>
        <a class="btn btn-primary" href="{{route('equipes')}}" role="button">Voltar</a>
    </form>

@endsection