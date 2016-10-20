<?php


interface iDAOUsuario
{
	public function cadastrar(Usuario $u);
	public function alterar(Usuario $u);
	public function excluir(Usuario $u);
	public function pesquisar(Usuario $u);
}

?>