<?php


interface iDAOFavorito
{
	public function cadastrar(Favorito $f);
	public function alterar(Favorito $f);
	public function excluir(Favorito $f);
	public function pesquisar(Favorito $f);
}

?>