<?php 
    if (isset($usuario)){
?>
    <div class="sidebar" id="sidebar" onload="ajustartela();">
        <div class="sidebar-container">
            <div class="sidebar-header">
                <div class="brand">
                    <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div>  </div>
            </div>
            <nav class="menu">
                <ul class="nav metismenu" id="sidebar-menu">
                    <li>
                        <a href="index"> <i class="fa fa-home"></i> Ínicio </a>
                    </li>
                     <li>
                        <a href="<?php echo BASE;?>/usuario/favoritos"> <i class="fa fa-th-large"></i> Favoritos </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

<?php
  }  
?>