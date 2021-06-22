<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{ URL::asset('assets/style.css') }}" rel="stylesheet">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    
    <title>Login</title>
</head>
<body>
<div id="login">
        
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{route('usuarios.login')}}" method="post">
                        @csrf    
                        <img src="https://www.portalsinergyrh.com.br/Areas/Portal/img/MeuPortal/beonup/logo-beonup.png">
                            
                        <?php
                            if(isset($_SESSION['mensagem'])){
                                echo$_SESSION['mensagem'];
                            }
                            ?>
                        
                        
                        <div class="form-group">
                                <label for="username" class="text-info"><b>Email:</b></label><br>
                                <!-- Campo email login-->
                                <input type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" id="email" class="form-control" required="" placeholder="nome@email.com"
                                    oninvalid="this.setCustomValidity('Email obrigatório')" oninput="setCustomValidity('')">
                                </input> 
                            </div>
                            



                            <div class="form-group">
                                <label for="password" class="text-info"><b>Senha:</b></label><br>
                                <!-- Campo senha login-->
                                <input type="password" minlength="3" name="senha" id="senha" class="form-control" required="" placeholder="Digite sua senha aqui" 
                                    oninvalid="this.setCustomValidity('Senha obrigatória')" oninput="setCustomValidity('')">
                                </input> 
                            </div>



                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Logar">
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>