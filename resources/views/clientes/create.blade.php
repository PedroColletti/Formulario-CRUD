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
    <form method="POST" action="{{route('clientes.insert')}}">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Nome:</b></label>
                    <input type="text" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" title="Apenas letras" class="form-control" id="" name="CLI_NOME" required>
                </div>
            </div>

           

            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>RG:</b></label>
                    <input  type="text" class="form-control" id="" pattern=".{12}" title="RG com 9 dígitos" name="CLI_RG"  onkeypress="$(this).mask('##.###.###-0');" required>
                </div>
            </div>


            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>CPF:</b></label>
                    <input type="text" class="form-control" id="" pattern=".{14}"  title="CPF com 11 dígitos" name="CLI_CPF" onkeypress="$(this).mask('###.###.###-00');" required>
                </div>
            </div>


            <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="cep"><b>CEP:</b></label>
                    <input class="form-control cep-mask" title="apenas números" type="text" id="cep" name="CLI_CEP" onkeypress="$(this).mask('00.000-000');"  required>
                </div>
            </div>
            



            <div class="col-md-4">
                <div class="form-group">
                    <label for="rua"><b>Rua:</b></label>
                    <input class="form-control" type="text" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ() 0-9]+$" title="Apenas letras, números e ()" id="rua" size="60" name="CLI_RUA" required>
                </div>
            </div>



            <div class="col-md-4">
                <div class="form-group">
                    <label for="bairro"><b>Bairro:</b></label>
                    <input class="form-control" type="text" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ() 0-9]+$" title="Apenas letras, números e ()" id="bairro" size="40" name="CLI_BAIRRO" required>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label for="cidade"><b>Cidade:</b></label>
                    <input  class="form-control" type="text" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ() 0-9]+$" title="Apenas letras, números e ()" id="cidade" size="40" name="CLI_CIDADE" required>
                </div>
            </div>


            <div class="col-md-1">
                <div class="form-group">
                    <label for="uf"><b>Estado:</b></label>
                    <input  class="form-control" type="text" oninput="this.value = this.value.toUpperCase()" pattern=".{2}" pattern="[A-Z]*$" title="Apenas abreviatura dos estados" id="uf" name="CLI_ESTADO" required>
                </div>
            </div>
        


        
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Numero:</b></label>
                    <input type="number" min="0" max="9999" onkeypress="$(this).mask('0000');" class="form-control" id="" name="CLI_NUMERO" required>
                </div>
            </div>



            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Complemento:</b></label>
                    <input type="text" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ() 0-9]+$" title="Apenas letras, números e ()" class="form-control" id="" name="CLI_COMPLEMENTO">
                </div>
            </div>
            </div>
            </div>




        <button type="submit" class="btn btn-primary">Enviar</button>

      
        <a class="btn btn-primary" href="{{route('clientes')}}" role="button">Voltar</a>



    </form>
</div>

@endsection