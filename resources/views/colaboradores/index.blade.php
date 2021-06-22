@extends('layouts.template')
@section('title', 'Colaboradores')
@section('content')

<!-- Sessão login / redirecionar para home / campo deletar-->
<?php 
@session_start();
if(@$_SESSION['id_usuario']==null){
    echo "<script language='javascript'> window.location='/' </script>";
}
if(!isset($id)){
  $id = ""; 
  
}

?>
  

<div class="container">
  

<a href="{{route('colaboradores.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Inserir Colaborador</a>

   <!-- DataTales Example -->
   <div class="card shadow mb-4">







<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Nome </th>
          <th>Salario em R$</th>
          <th>Data de nascimento</th>
          <th>Nome Equipe</th>
          <th>Ações</th>
          
        </tr>
      </thead>

      <tbody>
      @foreach($colaboradores as $colaborador)
        <tr>
          <td>{{$colaborador->nome}}</td>
          <td>{{$colaborador->salario}}</td>
          <td>{{$colaborador->data_de_nascimento}}</td>

          @foreach ($equipe as $equipes)
              <?php if ($equipes->id == $colaborador->cod){?>
              <td> {{$equipes->nome}}</td>
              <?php } ?>
          @endforeach
                  
              <?php if ($colaborador->cod == null){?>
                <td></td>

              <?php } ?>

                  
        <td>
        <a title="Detalhe" href="{{route('colaboradores.descricao', $colaborador->id)}}"><i class="fas fa-eye text-primary mr-1"></i></a>
        <a title="Editar" href="{{route('colaboradores.edit', $colaborador)}}"><i class="fas fa-edit text-info mr-1"></i></a>
        <a title="Apagar" href="{{route('colaboradores.modal', $colaborador)}}"><i class="fas fa-trash text-danger mr-1"></i></a>
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
        <form method="POST" action="{{route('colaboradores.delete', $id)}}">
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