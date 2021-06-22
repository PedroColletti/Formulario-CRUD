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
    <form method="POST" action="{{route('colaboradores.editar', $colaborador)}}">
        @csrf
        @method('put')

       


        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Nome</b></label>
                    <input type="text" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" title="Apenas letras"  class="form-control" id="" name="nome" value="{{$colaborador->nome}}" required>
                </div>
            </div>


            
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Salario em R$</b></label>
                    <input type="text" class="form-control" id="" name="salario" onkeypress="$(this).mask('000.000.000,00', {reverse: true});" value="{{$colaborador->salario}}" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Data de nascimento</b></label>
                    <input type="date" class="form-control" id="" name="data_de_nascimento" value="{{$colaborador->data_de_nascimento}}" required>
                </div>
            </div>

            <div class="col-md-6"><br>
                <div class="form-group">
                        <label for="exampleInputEmail1"><b>Equipe:</b> </label>
                        <select id="" name="cod" required>
                            @foreach($equipe as $equipe)
 
                                <?php if($equipe->id == $colaborador->cod){ ?>
                                    <option value="{{$equipe->id}}"  selected >{{$equipe->nome}}</option>
 
                                <?php }else{ ?>
                                    <option value="{{$equipe->id}}"  > {{$equipe->nome}}</option>
                                <?php } ?>
 
                            @endforeach  
                        </select>    
                </div>
            </div>


            <div class="col-md-6"><br>
                <div class="form-group">
                <label for="exampleInputEmail1"><b>Sexo:</b></label>
                        <select id="" name="sexo" required >

                    <?php if ($colaborador->sexo == "M") { ?>
                            <option value="{{$colaborador->sexo}}" selected> Masculino</option>
                            <option value="F">Feminino</option>
                    
                        <?php } else { ?>
                            <option value="{{$colaborador->sexo}}"> Feminino</option>
                            <option value="M">Masculino</option>

                    <?php } ?>

                        </select>

                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Senha:</b></label>
                    <input type="text" class="form-control" id="" name="senha" value="{{$colaborador->senha}}" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Email</b></label>
                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="nome@email.com" class="form-control" id="" name="email" value="{{$colaborador->email}}" required>
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-primary">Enviar</button>
        <a class="btn btn-primary" href="{{route('colaboradores')}}" role="button">Voltar</a>


    </form>
</div>

@endsection