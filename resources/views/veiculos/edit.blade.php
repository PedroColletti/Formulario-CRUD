@extends('layouts.template')
@section('title', 'veiculos')
@section('content')

<?php 
@session_start();
if(@$_SESSION['id_usuario']==null){
    echo "<script language='javascript'> window.location='/' </script>";
}
?>


<div class="container mt-2">
    <form method="POST" action="{{route('veiculos.editar', $veiculo)}}">
        @csrf
        @method('put')


        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Nome</b></label>
                    <input type="text" pattern="[A-Z a-z áàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ 0-9 ]+$" title="Apenas letras e números" class="form-control" id="" name="nome" value="{{$veiculo->nome}}" required>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Marca</b></label>
                    <input type="text" pattern="[A-Z a-z áàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ 0-9 ]+$" title="Apenas letras e números" class="form-control" id="" name="marca" value="{{$veiculo->marca}}" required>
                </div>
            </div>

            <div class="col-md-1">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Cor</b></label>
                    <input type="color" class="form-control" id="" name="cor" value="{{$veiculo->cor}}" required>
                </div>
            </div>

            <div class="col-md-1.5">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Ano</b></label>
                    <input type="number" min="1920" max="2022" onkeypress="$(this).mask('0000');" class="form-control" id="" name="ano" value="{{$veiculo->ano}}" required>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Placa</b></label>
                    <input type="text" pattern="[A-Z-0-9]*$" pattern=".{8}" oninput="this.value = this.value.toUpperCase()" title="Apenas letras maiúsculas e números"onkeypress="$(this).mask('AAA-9999');" class="form-control" id="" name="placa"  value="{{$veiculo->placa}}" required>
                </div>
            </div>
        </div>

  

        <button type="submit" class="btn btn-primary">Enviar</button>

        <a class="btn btn-primary" href="{{route('veiculos')}}" role="button">Voltar</a>

        </form>
</div>

@endsection