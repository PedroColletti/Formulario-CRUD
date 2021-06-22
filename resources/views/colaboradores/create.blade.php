@extends('layouts.template')
@section('title', 'Colaboradores')
@section('content')

<?php 
@session_start();
if(@$_SESSION['id_usuario']==null){
    echo "<script language='javascript'> window.location='/' </script>";
}
?>

<div class="container mt-4">
    <form method="POST" action="{{route('colaboradores.insert')}}">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Nome</b></label>
                    <input type="text" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" title="Apenas letras" class="form-control" id="" name="nome" required>
                </div>
            </div>

           

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Salario em R$</b></label>
                    <input type="text" class="form-control" id="" name="salario" onkeypress="$(this).mask('000.000.000,00', {reverse: true});" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Data de Nascimento</b></label>
                    <input type="date" class="form-control" id="" name="data_de_nascimento" required>
                </div>
            </div>


            <div class="col-md-6"> <br>
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Sexo:</b></label>
                        <select id="" name="sexo" required >
                        <option value="" selected > Escolha o sexo </option>
                        <option  value="M">Masculino</option>
                        <option  value="F">Feminino</option>
                        </select>
                </div>
            </div>



            <div class="col-md-6"><br>
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Equipe:</b></label>
                    <select id="" name="cod" required >

                        <option value="" selected > Escolha sua equipe </option>

                    @foreach ($equipe as $equipe)
                        <option value="{{$equipe->id}}"> {{$equipe->nome}}  </option>
                    @endforeach
                    </select>
                </div>
            </div>



        <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Senha</b></label>
                    <input type="password" class="form-control" id="" name="senha" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Email</b></label>
                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="nome@email.com" class="form-control" id="" name="email" required>

                </div>
            </div>
            </div>

            




        <button type="submit" class="btn btn-primary">Enviar</button>

      
        <a class="btn btn-primary" href="{{route('colaboradores')}}" role="button">Voltar</a>



    </form>
</div>


@endsection