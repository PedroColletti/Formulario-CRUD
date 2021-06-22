@extends('layouts.template')
@section('title', 'veiculo')
@section('content')

<?php 
@session_start();
if(@$_SESSION['id_usuario']==null){
    echo "<script language='javascript'> window.location='/' </script>";
}
?>


<div class="container mt-2">
    <form method="POST" action="{{route('veiculos.insert')}}">
        @csrf

        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Nome</b></label>
                    <input type="text" pattern="[A-Z a-z áàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ 0-9 ]+$" title="Apenas letras e números" class="form-control" id="" name="nome" required>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Marca</b></label>
                    <input type="text" pattern="[A-Z a-z áàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ 0-9 ]+$" title="Apenas letras e números" class="form-control" id="" name="marca" required>
                </div>
            </div>

            
            <div class="col-md-1">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Cor</b></label>
                    <input type="color" class="form-control" id="" name="cor" required>
                </div>
            </div>



            
        <div class="col-md-1.5">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Ano</b></label>
                    <input type="number" min="1920" max="2022" onkeypress="$(this).mask('0000');" class="form-control" id="" name="ano" required>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Placa</b></label>
                    <input type="text" pattern="[A-Z-0-9]*$"  pattern=".{8}" oninput="this.value = this.value.toUpperCase()" onkeypress="$(this).mask('AAA-9999');" class="form-control" id="" name="placa" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
        <a class="btn btn-primary" href="{{route('veiculos')}}" role="button">Voltar</a>
    </form>
</div>
@endsection