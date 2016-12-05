<?php
require_once('basica/Favorito.php');
require_once('iDAOFavorito.php');
require_once('util/conexao.php');

class DaoFavorito implements iDAOFavorito
{
	function __construct(){
	}


	public function cadastrar(Favorito $f){

		$comando = "insert into tb_favorito (link_player, titulo, autor, id_usuario) values (:link_player, :titulo, :autor, :id_usuario)";

		$stmt = Conexao::getInstance()->prepare($comando);

		$run = $stmt->execute(array(
    			':link_player' => $f->getLinkPlayer(),
    			':titulo' => $f->getTitulo(),
    			':autor' => $f->getAutor(),
				':id_usuario' => $f->getIdUsuario()
 		));
	}
	public function alterar(Favorito $f){

		$comando = "alter table tb_favorito set minutos_exec_player = :minutos_exec_player where id = :id";

		$stmt = Conexao::getInstance()->prepare($comando);

		$run = $stmt->execute(array(
    			':minutos_exec_player' => $f->getMinutosExecPlayer(),
    			':id' => $f->getId(),
 		));

	}
	public function excluir(Favorito $f){

		$comando = "delete from tb_favorito where id = :id)";

		$stmt = Conexao::getInstance()->prepare($comando);

		$run = $stmt->execute(array(
    			':id' => $f->getId()
 		));

	}
	public function pesquisar(Favorito $f){

		$comando = 'select link_player, titulo, autor, minutos_exec_player, id_usuario from tb_favorito ';

		if (!empty($f->getLinkPlayer())){
			if (empty($where)){
				$where = ' where link_player = :link_player';
			}else{
				$where = $where . ' and link_player = :link_player';
			}
		}
		if (!empty($f->getTitulo())){
			if (empty($where)){
				$where = ' where titulo = :titulo';
			}else{
				$where = $where . ' and titulo = :titulo';
			}
		}
		if (!empty($f->getAutor())){
			if (empty($where)){
				$where = ' where autor = :autor';
			}else{
				$where = $where . ' and autor = :autor';
			}
		}
		if (!empty($f->getMinutosExecPlayer())){
			if (empty($where)){
				$where = ' where minutos_exec_player = :minutos_exec_player';
			}else{
				$where = $where . ' and minutos_exec_player = :minutos_exec_player';
			}
		}
		if (!empty($f->getIdUsuario())){
			if (empty($where)){
				$where = ' where id_usuario = :id_usuario';
			}else{
				$where = $where . ' and id_usuario = :id_usuario';
			}
		}

		$stmt = Conexao::getInstance()->prepare($comando . $where);

		if (!empty($f->getLinkPlayer()))
			$stmt->bindValue(':link_player', $f->getLinkPlayer());

		if (!empty($f->getTitulo()))
			$stmt->bindValue(':titulo', $f->getTitulo());

		if (!empty($f->getAutor()))
			$stmt->bindValue(':autor', $f->getAutor());

		if (!empty($f->getMinutosExecPlayer()))
			$stmt->bindValue(':minutos_exec_player', $f->getMinutosExecPlayer());

		if (!empty($f->getIdUsuario()))
			$stmt->bindValue(':id_usuario', $f->getIdUsuario());

		$run = $stmt->execute();
		return ($stmt->fetchAll(PDO::FETCH_ASSOC));
	}



}
?>