<?php
    session_start();

    unset($_SESSION['usuario']); 


    error_reporting(0);
    ini_set(“display_errors”, 0 );
?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> ModularAdmin - Free Dashboard Theme | HTML Version </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/vendor.css">
        <link rel="stylesheet" id="theme-style" href="css/app.css">
        <!-- Theme initialization -->
    </head>

    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
        <div class="logo">
        	<span class="l l1"></span>
        	<span class="l l2"></span>
        	<span class="l l3"></span>
        	<span class="l l4"></span>
        	<span class="l l5"></span>
        </div>        Gestor de PodCast
      </h1> </header>
                    <div class="auth-content">
                        <p class="text-xs-center">CRIE SUA CONTA PARA CONTINUAR</p>
                        <form id="signup-form" action="../negocio/RNUsuario.php" method="POST" novalidate="">
                            <div class="form-group"> <label for="firstname">Nome</label>
                                <div class="row">
                                    <div class="col-sm-6"> <input type="text" class="form-control underlined" name="firstname" id="firstname" placeholder="Primeiro nome" required=""> </div>
                                    <div class="col-sm-6"> <input type="text" class="form-control underlined" name="lastname" id="lastname" placeholder="Sobrenome" required=""> </div>
                                </div>
                            </div>
                            <div class="form-group"> <label for="email">Email</label> <input type="email" class="form-control underlined" name="email" id="email" placeholder="Email" required=""> </div>
                            <div class="form-group"> <label for="password">Senha</label>
                                <div class="row">
                                    <div class="col-sm-6"> <input type="password" class="form-control underlined" name="password" id="password" placeholder="Senha" required=""> </div>
                                    <div class="col-sm-6"> <input type="password" class="form-control underlined" name="retype_password" id="retype_password" placeholder="Confirmar senha" required=""> </div>
                                </div>
                            </div>
                            <div class="form-group"> <label for="agree">
            <input class="checkbox" name="agree" id="agree" type="checkbox" required=""> 
            <span>Aceito os termos e a <a href="#">política</a></span>
          </label> </div>
                            <div class="form-group"> <label for="message"> <div class="message">  <?php if ($_SESSION['mensagem_cadastro'] !='') {echo $_SESSION['mensagem_cadastro'] ;}?> </div> </label>
                            <div class="form-group"> <button type="submit" name="cadastrar" id="cadastrar" class="btn btn-block btn-primary">Cadastrar</button> </div>
                            <div class="form-group">
                                <p class="text-muted text-xs-center">Já possui uma conta? <a href="login.html">Entre!</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-xs-center">
                    <a href="index.php" class="btn btn-secondary rounded btn-sm"> <i class="fa fa-arrow-left"></i> Voltar para página principal </a>
                </div>
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
    </body>

</html>

<?php
    $_SESSION['mensagem_cadastro'] = '';   
?>