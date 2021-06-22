<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>


    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!--Dinheiro-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    <link href="{{ URL::asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>
<body>





<nav class="navbar navbar-expand-lg navbar-light bg-light">

      <!--Logo-->
      <a class="navbar-brand" href="https://www.beonup.com.br/">
      <img src="https://static.wixstatic.com/media/922fa8_d9ffbdd65a084844ad84b9843fc4b38b~mv2.png/v1/fill/w_140,h_44,al_c,q_85,usm_0.66_1.00_0.01/Logo_Beonup_02.webp" class="d-inline-block align-top" alt="" style="width:127px;height:40px;object-fit:cover;object-position:50% 50%">
      </a>

      <!--3 botões-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">

      <!--Colaboradores-->
      <ul class="navbar-nav mr-2">
      <a class="btn btn-outline-primary"  href="{{route('colaboradores')}}">Colaboradores</a>
      </ul>

      <!--Equipes-->
       <ul class="navbar-nav mr-2">
      <a class="btn btn-outline-primary" href="{{route('equipes')}}">Equipes</a>
      </ul>

      <!--Viagens-->
      <ul class="navbar-nav mr-2">
      <a class="btn btn-outline-primary"  href="{{route('viagens')}}">Viagens</a>
      </ul>


      <!--Veículos-->
      <ul class="navbar-nav mr-2">
      <a class="btn btn-outline-primary" href="{{route('veiculos')}}">Veículos</a>
      </ul>

      <!--Clientes-->
      <ul class="navbar-nav mr-2">
      <a class="btn btn-outline-primary"  href="{{route('clientes')}}">Clientes</a>
      </ul>

      <!--Sair-->
      <ul class="navbar-nav mr-2">
      <a class="btn btn-outline-warning" href="{{route('usuarios.logout')}}">Sair</a>
       </ul>


    </div>
  </div>
</nav>
    @yield('content')



    
     
</body>
</html>

<!-- Scripts DataTables -->
<script src="{{ URL::asset('assets/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ URL::asset('assets/datatables/datatables-demo.js') }}"></script>
