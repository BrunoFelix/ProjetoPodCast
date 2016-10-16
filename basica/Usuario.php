<?php
class Usuario{
	private $id;
	private $nome;
	private $sobrenome;
	private $login;
	private $senha; 

	function __construct(){

	}

	function setId($id)
	{
		$this->id = trim($id);
	}
	function getId()
	{
		return $this->id;
	}

	function setLogin($login)
	{
		$this->login = trim($login);
	}
	function getLogin()
	{
		return $this->login;
	}

	function setSenha($senha)
	{
		$this->senha = trim($senha);
	}
	function getSenha()
	{
		return $this->senha;
	}

	function setNome($nome)
	{
		$this->nome = trim($nome);
	}
	function getNome()
	{
		return $this->nome;
	}

	function setSobrenome($sobrenome)
	{
		$this->sobrenome = trim($sobrenome);
	}
	function getSobrenome()
	{
		return $this->sobrenome;
	}

	function __destruct(){

	}
}

?>