@extends('layouts.template')
@section('title', 'Viagem')
@section('content')

<?php 
@session_start();
if(@$_SESSION['id_usuario']==null){
    echo "<script language='javascript'> window.location='/' </script>";
}
?>


<div class="container mt-4">
    <form method="POST" action="{{route('viagens.insert')}}">
        @csrf

        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Motorista:</b></label>
                    <select id="" name="motorista" required>
                    <option value="" selected > Escolha um motorista </option>
                    @foreach ($colaborador as $colaborador)
                        <option value="{{$colaborador->nome}}"> {{$colaborador->nome}} </option>
                    @endforeach
                    </select>
                </div>
            </div>
        
            



            <div class="col-md-6"> 
                    <div class="form-group">
                    <label  for="exampleInputEmail1"><b>Placa:</b> </label>
                    <select id="" name="placa" required>
                    <option value="" selected > Escolha um veículo</option>
                    @foreach ($veiculo as $veiculo)
                        <option value="{{$veiculo->placa}}"> {{$veiculo->placa}} </option>
                    @endforeach
                    </select>
                </div>
            </div>
    
    

            <div class="col-md-3">
                    <div class="form-group">
                    <label for="exampleInputEmail1"><b>Data:</b></label>
                    <input type="date" class="form-control" id="" name="data" required>
                </div>
            </div>
        
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
        <a class="btn btn-primary" href="{{route('viagens')}}" role="button">Voltar</a>

        
    </form>
</div>
@endsection