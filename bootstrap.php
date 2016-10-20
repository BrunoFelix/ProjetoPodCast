<?php
require_once 'util/AutoLoader.php';
$directories  = array('basica', 'negocio' , 'util' , 'dados' , 'gui');
$autoloader = new ClassAutoloader($directories);
require_once 'routes.php';
?>
