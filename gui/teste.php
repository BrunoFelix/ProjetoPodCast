<?php
    require_once('../util/conexao.php');
    $connect = Conexao::getInstance();

    /*$connect->comando('SELECT * FROM tb_usuario');
 
 
    echo 'Foram encontrados: ' . mysql_num_rows($connect->executar()) . ' usuários em seu banco de dados';*/


     $data = $connect->query('SELECT * FROM tb_usuario');
  
    /*foreach($data as $row) {
        print_r($row); 
    }*/


?>