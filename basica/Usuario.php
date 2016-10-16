<?php
class Usuario{
	private $id;
	private $login;
	private $senha; 

	function __construct(){

	}

	function setId($id)
	{
		$this->id = $id;
	}
	function getId()
	{
		return $this->id;
	}

	function setLogin($login)
	{
		$this->login = $login;
	}
	function getLogin()
	{
		return $this->login;
	}

	function setSenha($senha)
	{
		$this->senha = $senha;
	}
	function getSenha()
	{
		return $this->senha;
	}

	function __destruct(){

	}
}

?>