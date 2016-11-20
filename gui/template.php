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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>
        <!-- Theme initialization -->
    </head>
    <body onLoad="init()">
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
    function submitform(display) {

        var texto = "a #"+display+" form";

        var descendentes = document.querySelectorAll("a form");

        for (var i = 0; i < descendentes.length; i++) {
                if (descendentes[i].id == display){
                    descendentes[i].submit();
                }
        }
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

    var pager = new Pager('tabela_player', 24);
        pager.init(); 
        pager.showPageNav('pager', 'pageNav'); 
        pager.showPage(1);


    function Pager(tableName, itemsPerPage) {
        this.tableName = tableName;
        this.itemsPerPage = itemsPerPage;
        this.currentPage = 1;
        this.pages = 0;
        this.inited = false;
        
        this.showRecords = function(from, to) {        
            var rows = document.getElementById(tableName).rows;
            // i starts from 1 to skip table header row
            for (var i = 1; i < rows.length; i++) {
                if (i < from || i > to)  
                    rows[i].style.display = 'none';
                else
                    rows[i].style.display = '';
            }
        }
        
        this.showPage = function(pageNumber) {
            if (! this.inited) {
                alert("not inited");
                return;
            }

            var oldPageAnchor = document.getElementById('pg'+this.currentPage);
            oldPageAnchor.className = 'pg-normal';
            
            this.currentPage = pageNumber;
            var newPageAnchor = document.getElementById('pg'+this.currentPage);
            newPageAnchor.className = 'pg-selected';
            
            var from = (pageNumber - 1) * itemsPerPage + 1;
            var to = from + itemsPerPage - 1;
            this.showRecords(from, to);
        }   
        
        this.prev = function() {
            if (this.currentPage > 1)
                this.showPage(this.currentPage - 1);
        }
        
        this.next = function() {
            if (this.currentPage < this.pages) {
                this.showPage(this.currentPage + 1);
            }
        }                        
        
        this.init = function() {
            var rows = document.getElementById(tableName).rows;
            var records = (rows.length - 1); 
            this.pages = Math.ceil(records / itemsPerPage);
            this.inited = true;
        }

        this.showPageNav = function(pagerName, positionId) {
            if (! this.inited) {
                alert("not inited");
                return;
            }
            var element = document.getElementById(positionId);
            
            var pagerHtml = '<span onclick="' + pagerName + '.prev();" class="pg-ctrl"> &#171 </span>';
            for (var page = 1; page <= this.pages; page++) 
                pagerHtml += '<span id="pg' + page + '" class="pg-normal" onclick="' + pagerName + '.showPage(' + page + ');"> ' + page + ' </span>';
            pagerHtml += '<span onclick="'+pagerName+'.next();" class="pg-ctrl"> &#187;</span>';            
            
            element.innerHTML = pagerHtml;
        }
    }
</script>