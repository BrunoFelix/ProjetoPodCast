
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Gestor de PodCast - Gestor Gratuito</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/vendor.css">
        <link rel="stylesheet" id="theme-style" href="css/app.css">
        <!-- Theme initialization -->
    </head>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
    			<i class="fa fa-bars"></i>
    		</button> </div>
                    <div class="header-block header-block-search hidden-sm-down">
                        <form role="search">
                            <div class="input-container"> <i class="fa fa-search"></i> <input type="search" placeholder="Search">
                                <div class="underline"></div>
                            </div>
                        </form>
                    </div>
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="name"><?php echo $usuario[0]["nome"]. ' '. $usuario[0]["sobrenome"]; ?></span> 
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#"> <i class="fa fa-user icon"></i> Perfil </a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-gear icon"></i> Configurações </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="login.php"> <i class="fa fa-power-off icon"></i> Sair </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> Gestor de PodCast </div>
                        </div>
                        <nav class="menu">
                            <ul class="nav metismenu" id="sidebar-menu">
                                <li class="active">
                                    <a href="index2.php"> <i class="fa fa-home"></i> Dashboard </a>
                                </li>
                                <li>
                                    <a href=""> <i class="fa fa-th-large"></i> Meus PodCasts <i class="fa arrow"></i> </a>
                                    <ul>
                                        <li> <a href="#">
    								Escutar
    							</a> </li>
                                        <li> <a href="#">
    								Gerenciar
    							</a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <footer class="sidebar-footer">
                        
                    </footer>
                </aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <article class="content dashboard-page">


                 <?php 



                    // permite requisições a urls externas
                    ini_set('allow_url_fopen', 1);
                    ini_set('allow_url_include', 1);

                    // caminho do feed do meu blog
                    executarRss('https://jovemnerd.com.br/feed-nerdcast/', 5);
                    executarRss('https://mundopodcast.com.br/feed/', 5);
                    executarRss('http://www.portalcafebrasil.com.br/todos/podcasts/feed/', 5);

                    function executarRss($feed, $qtd){
                        $rss = simplexml_load_file($feed);
                            // limite de itens
                        $limit = $qtd;
                        // contador
                        $count = 0;

                        if($rss)
                        {
                            echo '<br>';
                            echo '<br>';
                            echo $rss->channel->title;
                            echo '<br>';
                            echo '<br>';
                            echo '<br>';
                            foreach ( $rss->channel->item as $item )
                            {
                                
                                //echo $item->enclosure["url"];
                                // formata e imprime uma string
                                echo $item->title;
                                echo '<br/>';
                                echo '<audio src="'.$item->enclosure["url"].'" controls="controls" loop preload="preload" title="'.$item->title.'">  </audio>';
                                echo '<br/>';
                                // incrementamos a variável $count
                                $count++;
                                // caso nosso contador seja igual ao limite paramos a iteração
                                if($count == $limit) break;
                            }
                        }
}


                  ?>



                </article>
                <footer class="footer">
                    <div class="footer-block buttons"> Copyright © 2016 Gestor de PodCast - Todos os direitos reservados </div>
                    <div class="footer-block author">
                        <ul>
                            <li> Design desenvolvido por <a href="https://github.com/modularcode">ModularCode</a> </li>
                        </ul>
                    </div>
                </footer>
                <div class="modal fade" id="modal-media">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    					<span class="sr-only">Close</span>
    				</button>
                                <h4 class="modal-title">Media Library</h4> </div>
                            <div class="modal-body modal-tab-container">
                                <ul class="nav nav-tabs modal-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link" href="#gallery" data-toggle="tab" role="tab">Gallery</a> </li>
                                    <li class="nav-item"> <a class="nav-link active" href="#upload" data-toggle="tab" role="tab">Upload</a> </li>
                                </ul>
                                <div class="tab-content modal-tab-content">
                                    <div class="tab-pane fade" id="gallery" role="tabpanel">
                                        <div class="images-container">
                                            <div class="row"> </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade active in" id="upload" role="tabpanel">
                                        <div class="upload-container">
                                            <div id="dropzone">
                                                <form action="/" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                    <div class="dz-message-block">
                                                        <div class="dz-message needsclick"> Drop files here or click to upload. </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <button type="button" class="btn btn-primary">Insert Selected</button> </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="modal fade" id="confirm-modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
                                <h4 class="modal-title"><i class="fa fa-warning"></i> Alert</h4> </div>
                            <div class="modal-body">
                                <p>Are you sure want to do this?</p>
                            </div>
                            <div class="modal-footer"> <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button> <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button> </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
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