@extends('layouts.template')
@section('title', 'Pag Inicial Viagens')
@section('content')

<?php 
@session_start();
if(@$_SESSION['id_usuario']==null){
    echo "<script language='javascript'> window.location='/' </script>";
}
?>


<?php
if(!isset($id)){
  $id = ""; 
}

?>
  

<div class="container">

<a href="{{route('viagens.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Inserir Viagem</a>

   <!-- DataTales Example -->
   <div class="card shadow mb-4">

<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Motorista</th>
          <th>Placa</th>
          <th>Data</th>
          <th>Ações</th>
        </tr>
      </thead>


      <tbody>
      @foreach($viagens as $viagem)
        <tr>
        <td>{{$viagem->motorista}}</td>
        <td>{{$viagem->placa}}</td>
        <td>{{$viagem->data}}</td>
        <td>
        <a title="Detalhe" href="{{route('viagens.descricao', $viagem->id)}}"><i class="fas fa-eye text-primary mr-1"></i></a>
        <a title="Editar" href="{{route('viagens.edit', $viagem)}}"><i class="fas fa-edit text-info mr-1"></i></a>
        <a title="Apagar" href="{{route('viagens.modal', $viagem)}}"><i class="fas fa-trash text-danger mr-1"></i></a>
        </td>
      </tr>
        @endforeach
      </tbody>
  </table>
</div>
</div>
</div>
</div>


      <!--Modal-->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja Realmente Excluir este Registro?
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form method="POST" action="{{route('viagens.delete', $id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
if(@$id != ""){
  echo "<script>$('#exampleModal').modal('show');</script>";
}
?>

@endsection