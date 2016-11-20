<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title> Gestor de PodCast - Gestor Gratuito</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="../gui/css/vendor.css">
        <link rel="stylesheet" href="gui/css/vendor.css">
        <!-- Theme initialization -->
    </head>

    <body>
        <div class="main-wrapper">
            <div style="padding-left: 0" class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
    			<i class="fa fa-bars"></i>
    		</button> </div>
                    <div class="header-block header-block-search hidden-sm-down">
                        <form name="pesquisar" id="pesquisar" role="search" method="" action="">
                            <div class="input-container"> <i class="fa fa-search"></i> <input name="pesquisar-texto" id="pesquisar-texto" type="search" placeholder="Digite o podcast que deseja ouvir"><a href="javascript: pesquisar()">Pesquisar</a>
                                
                            </div>
                        </form>
                    </div>
                    
                </header>
               
                <?php //require_once 'menu.php';?>
               
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <article class="content dashboard-page" id="content dashboard-page">

					
            		<?php  
            		$pathC = $fileLoader->loader($tela,$pasta); 
            		if (!empty($pathC)){
            			require_once $pathC;
            		}
            		?>
            		     


                </article>
                
                <?php require_once 'footer.php';?>
            
       

        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="../gui/js/vendor.js"></script>
        <script src="../gui/js/app.js"></script>
    </body>

</html>


<script type="text/javascript">
    function submitform() {
        document.getElementById('formulario').submit();
    }

    function pesquisar(){
        var display = document.getElementById('pesquisar-texto').value;
        var pai = document.getElementById("content dashboard-page");
        var nome = '';

        for(var i = 0; i < pai.children.length; i++){
                pai.children[i].style.visibility = 'visible';
                pai.children[i].style.position = 'relative';
                
                nome = pai.children[i].name.toUpperCase();
 
               //alert(nome);

                if(nome.indexOf(display.toUpperCase()) <= -1){
                    pai.children[i].style.position = 'absolute';
                    pai.children[i].style.visibility = 'hidden';
                }
        }
  

        /*if document.getElementById(). <> display{
            document.getElementById(display).style.display = 'none';
        }*/
    }
</script>