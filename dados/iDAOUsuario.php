<?php
require_once('../basica/Usuario.php');

interface iDAOUsuario
{
	public function adicionar(Usuario $u);
	public function alterar(Usuario $u);
	public function excluir(Usuario $u);
	public function pesquisar(Usuario $u);
}

?>