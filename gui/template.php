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
        <link rel="stylesheet" id="theme-style" href="../gui/css/app.css">
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
                        <form role="search">
                            <div class="input-container"> <i class="fa fa-search"></i> <input type="search" placeholder="Pesquisar por tema, autor, estilo, etc...">
                                <div class="underline"></div>
                            </div>
                        </form>
                    </div>
                    
                </header>
               
                <?php //require_once 'menu.php';?>
               
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <article class="content dashboard-page">

					
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