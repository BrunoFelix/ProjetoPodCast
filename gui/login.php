<?php
    session_start();

    error_reporting(0);
    ini_set(“display_errors”, 0 );
?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Gestor de PodCast </title>
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
           
        </div>        Gestor de PodCast
      </h1> </header>
                    <div class="auth-content">
                        <p class="text-xs-center">ENTRE NA SUA CONTA PARA CONTINUAR</p>
                        <form id="login-form" action="../negocio/RNUsuario.php" method="POST" novalidate="">
                            <div class="form-group"> <label for="username">Usuário</label> <input type="text" class="form-control underlined" name="username" id="username" placeholder="Seu email" required> </div>
                            <div class="form-group"> <label for="password">Senha</label> <input type="password" class="form-control underlined" name="password" id="password" placeholder="sua senha" required> </div>
                            <div class="form-group"> <label for="message"> <div class="message">  <?php if ($_SESSION['mensagem_login'] !='') {echo $_SESSION['mensagem_login'] ;}?> </div> </label>
                            <div class="form-group"> <label for="remember">

            <input class="checkbox" id="remember" type="checkbox"> 
            <span>Lembrar</span>
          </label> <a href="reset.html" class="forgot-btn pull-right">Equeçeu a senha?</a> </div>
                            <div class="form-group"> <button type="submit" name="logar" id="logar" class="btn btn-block btn-primary">Login</button> </div>
                            <div class="form-group">
                                <p class="text-muted text-xs-center">Não possui uma conta? <a href="signup.html">Cadastre-se!</a></p>
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
    $_SESSION['mensagem_login'] = '';   
?>