<?php
require_once 'util/AutoLoader.php';
require_once 'util/FileLoader.php';

define('BASE' , '/'.end(explode('\\',__DIR__)));

$directories  = array('basica', 'negocio' , 'util' , 'dados' , 'gui');
$autoloader = new ClassAutoloader($directories);
$fileLoader =  new FileLoader();
require_once 'routes.php';



?>
