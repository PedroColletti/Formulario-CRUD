@extends('layouts.template')
@section('title', 'Editar Viagem')
@section('content')

<?php 
@session_start();
if(@$_SESSION['id_usuario']==null){
    echo "<script language='javascript'> window.location='/' </script>";
}
?>


<div class="container mt-4">
    <form method="POST" action="{{route('viagens.editar', $viagem)}}">
        @csrf
        @method('put')


        <div class="col-md-3">
                <div class="form-group">
                        <label for="exampleInputEmail1"><b>Motorista:</b> </label>
                        <select id="" name="motorista" required>
                            @foreach($colaborador as $colaborador)
 
                                <?php if($colaborador->nome == $viagem->motorista){ ?>
                                    <option value="{{$colaborador->nome}}"  selected >{{$colaborador->nome}}</option>
 
                                <?php }else{ ?>
                                    <option value="{{$colaborador->nome}}"  > {{$colaborador->nome}}</option>
                                <?php } ?>
 
                            @endforeach  
                        </select>    
                </div>
            </div>



            <div class="col-md-3">
                <div class="form-group">
                        <label for="exampleInputEmail1"><b>Placa:</b> </label>
                        <select id="" name="placa" required>
                            @foreach ($veiculo as $veiculo)

                            <?php if ($veiculo->placa == $viagem->placa){?>
                                    <option value="{{$veiculo->placa}}" selected > {{$veiculo->placa}}</option>

                            <?php } else{ ?>
                                <option value="{{$veiculo->placa}}" > {{$veiculo->placa}}</option>
                            <?php } ?>
                            @endforeach
                                


                        </select>    
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Data</b></label>
                    <input type="date" class="form-control" id="" name="data" value="{{$viagem->data}}" required>
                </div>
            </div>




        <button type="submit" class="btn btn-primary">Enviar</button>
        <a class="btn btn-primary" href="{{route('viagens')}}" role="button">Voltar</a>
        </form>
</div>
@endsection