<?php

 
class Conexao {
 
 
  /* private $host = "localhost"; // Endereço do servidor do banco de dados
   private $bd = "projetopodcast"; // Banco de dados utilizado na conexão
   private $usuario = "root"; // Usuário do banco de dados que possua acesso ao schema
   private $senha = ""; // Senha do usuário
   private $sql = ""; // Consulta a ser executada

   function __construct(){
      $this->conectar();
      $this->selecionarDB();
   }
 
   function conectar(){
   
      $conexao = mysql_connect($this->host,$this->usuario,$this->senha) or die($this->mensagem(mysql_error()));
      return $conexao;
   }
 
   function selecionarDB(){ 
      $banco = mysql_select_db($this->bd) or die($this->mensagem(mysql_error()));
      if($banco){
         return true;
      }else{
         return false;
      }
   }
 
   function executar(){
      $query = mysql_query($this->sql) or die ($this->mensagem(mysql_error()));
      return $query;
   }
 
   function comando($valor){
      $this->sql = $valor;
   }
 
   function mensagem($erro){
      echo $erro;
   }

   function desconectar(){
      mysql_close();
   }

   function __destruct(){
      $this->desconectar();
   }*/


   //USANDO PDO
   public static $instance;

   public function __construct() {
      $this->getInstance();
   }

   public static function getInstance() {
      if (!isset(self::$instance)) {
      self::$instance = new PDO('mysql:host=localhost;dbname=projetopodcast', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
      }

   return self::$instance;
   }
}
 
?>