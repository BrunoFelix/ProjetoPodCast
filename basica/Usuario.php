<?php
class Usuario{
	private $id;
	private $nome;
	private $sobrenome;
	private $login;
	private $senha; 
	private $email;
	private $favorito = array();

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

	function setEmail($email)
	{
		$this->email = trim($email);
	}
	function getEmail()
	{
		return $this->email;
	}

	public function setFavorito($favorito){
		$this->favorito = $favorito;
	}
	
	public function getFavorito(){
		return $this->favorito;	
	}
	
	function __destruct(){

	}
}

?>