<?php
class Controller {
	

	public function __construct(){
		session_start();
		$favorito = NULL;
		$usuario = NULL;
		if($this->isLoggedUser()){	
			$usuario = $this->getUser();
			$favorito = $this->getFavorito();
		}
	
		$this->set("usuario", $usuario);
		$this->set('favorito' , $favorito);

	}


	public function set($nome , $valor){
		global $variables;
		$variables[$nome] = $valor;
	}

	


	public function startLogin($usuario , $favoritos = array()){
		session_unset('usuario');
		session_unset('favorito');
		$_SESSION['usuario'] = $usuario;
		$_SESSION['favorito'] = $favoritos;
	}

	public function getUser(){
		return $_SESSION['usuario'];
	}
	
	public function getFavorito(){
		return $_SESSION['favorito'];
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