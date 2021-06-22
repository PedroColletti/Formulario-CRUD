@extends('layouts.template')
@section('title', 'Clientes')
@section('content')


<?php 
@session_start();
if(@$_SESSION['id_usuario']==null){
    echo "<script language='javascript'> window.location='/' </script>";
}
?>

            <!-- Adicionando JQuery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            <!--Dinheiro-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

            
            <!-- Adicionando Javascript -->
        <script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
        <script type="text/javascript" src="jquery.maskedinput-1.1.4.pack.js"></script>

    
            <script>

        $(document).ready(function() {


            


            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
    </head>


<div class="container mt-4">
    <form method="POST" action="{{route('clientes.editar', $cliente)}}">
        @csrf
        @method('put')

        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Nome:</b></label>
                    <input type="text" class="form-control" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" title="Apenas letras" id="" name="CLI_NOME" value="{{$cliente->CLI_NOME}}" required></input>
                </div>
            </div>

           

            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>RG:</b></label>
                    <input type="text" class="form-control" pattern=".{12}" title="RG com 9 dígitos" id="" name="CLI_RG" value="{{$cliente->CLI_RG}}" onkeypress="$(this).mask('##.###.###-0');" required></input>
                </div>
            </div>


            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>CPF:</b></label>
                    <input type="text" class="form-control"  pattern=".{14}"  title="CPF com 11 dígitos"  id="" name="CLI_CPF" value="{{$cliente->CLI_CPF}}" onkeypress="$(this).mask('###.###.###-00');" required></input>
                </div>
            </div>

            

            <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>CEP:</b></label>
                    <input class="form-control" type="text"  id="cep"  name="CLI_CEP" value="{{$cliente->CLI_CEP}}" onkeypress="$(this).mask('00.000-000');" required>
                    
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label for="logradouro"><b>Rua:</b></label>
                    <input class="form-control" type="text" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ 0-9]+$" title="Apenas letras, números e ()" id="rua" size="60" name="CLI_RUA" value="{{$cliente->CLI_RUA}}" required></input>
                </div>
            </div>





            <div class="col-md-4">
                <div class="form-group">
                    <label for="bairro"><b>Bairro:</b></label>
                    <input class="form-control" type="text" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ() 0-9]+$" title="Apenas letras, números e ()" id="bairro" size="40" name="CLI_BAIRRO" value="{{$cliente->CLI_BAIRRO}}" required></input>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label for="localidade"><b>Cidade:</b></label>
                    <input class="form-control" type="text" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ() 0-9]+$" title="Apenas letras, números e ()" id="cidade" size="40" name="CLI_CIDADE" value="{{$cliente->CLI_CIDADE}}" required></input>
                </div>
            </div>


            <div class="col-md-1">
                <div class="form-group">
                    <label for="uf"><b>Estado:</b></label>
                    <input class="form-control" pattern=".{2}" maxlength="2" oninput="this.value = this.value.toUpperCase()" type="text" pattern="[A-Z]*$" title="Apenas abreviatura dos estados"  id="uf" name="CLI_ESTADO" value="{{$cliente->CLI_ESTADO}}" required></input>
                </div>
            </div>
        

        <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Numero:</b></label>
                    <input type="number" min="0" max="9999" onkeypress="$(this).mask('0000');" class="form-control" id="" name="CLI_NUMERO" value="{{$cliente->CLI_NUMERO}}" required></input>
                </div>
            </div>



            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Complemento:</b></label>
                    <input type="text" class="form-control" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ() 0-9]+$" title="Apenas letras, números e ()" id="" name="CLI_COMPLEMENTO" value="{{$cliente->CLI_COMPLEMENTO}}"></input>
                </div>
            </div>
            </div>
            </div>
          

        
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a class="btn btn-primary"  href="{{route('clientes')}}" role="button">Voltar</a>

        
    </form>
</div>

@endsection