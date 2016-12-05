<?php
class Controller {
	

	public function __construct(){
		session_start();

		$usuario = NULL;
		if($this->isLoggedUser())	
			$usuario = $this->getUser();
	
		$this->set("usuario", $usuario);

	}


	public function set($nome , $valor){
		global $variables;
		$variables[$nome] = $valor;
	}

	


	public function startLogin($usuario){
		session_unset('usuario');
		$_SESSION['usuario'] = $usuario;
	}

	public function getUser(){
		return $_SESSION['usuario'];
	}

	public function getIdUser(){
		return $_SESSION['usuario'][0]["id"];
	}

	public function isLoggedUser(){
		return (isset($_SESSION['usuario']))? true : false;		
	}


	public function stopLogin(){
		session_destroy();
	}

}