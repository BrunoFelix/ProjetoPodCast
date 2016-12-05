<?php
class Favorito{
	private $id;
	private $linkPlayer;
	private $minutosExecPlayer;
	private $titulo;
	private $autor;
	private $idUsuario; 

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

	function setLinkPlayer($linkPlayer)
	{
		$this->linkPlayer = trim($linkPlayer);
	}
	function getLinkPlayer()
	{
		return $this->linkPlayer;
	}

	function setMinutosExecPlayer($minutosExecPlayer)
	{
		$this->minutosExecPlayer = trim($minutosExecPlayer);
	}
	function getMinutosExecPlayer()
	{
		return $this->minutosExecPlayer;
	}

	function setTitulo($titulo)
	{
		$this->titulo = trim($titulo);
	}
	function getTitulo()
	{
		return $this->titulo;
	}

	function setAutor($autor)
	{
		$this->autor = trim($autor);
	}
	function getAutor()
	{
		return $this->autor;
	}

	function setIdUsuario($idUsuario)
	{
		$this->idUsuario = trim($idUsuario);
	}
	function getIdUsuario()
	{
		return $this->idUsuario;
	}
	
	function __destruct(){

	}
}

?>