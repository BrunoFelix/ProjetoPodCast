<?php
require_once('../basica/Usuario.php');
require_once('iDAOUsuario.php');
require_once('../util/conexao.php');

class DaoUsuario implements iDAOUsuario
{
	function __construct(){
	}


	public function adicionar(Usuario $u){

	}
	public function alterar(Usuario $u){

	}
	public function excluir(Usuario $u){

	}
	public function pesquisar(Usuario $u){

		$comando = 'select * from tb_usuario ';

		if (!empty($u->getLogin())){
			if (empty($where)){
				$where = ' where login = :login';
			}else{
				$where = $where . ' and login = :login';
			}
		}
		if (!empty($u->getSenha())){
			if (empty($where)){
				$where = ' where senha = :senha';
			}else{
				$where = $where . ' and senha = :senha';
			}
		}
		if (!empty($u->getId())){
			if (empty($where)){
				$where = ' where id = :id';
			}else{
				$where = $where . ' and id = :id';
			}
		}


		$stmt = Conexao::getInstance()->prepare($comando . $where);

		$stmt->bindValue(':login', $u->getLogin());
		$stmt->bindValue(':senha', $u->getSenha());
		//$stmt->bindValue(':id', $u->getId());

		$run = $stmt->execute();
		return ($stmt->fetchAll(PDO::FETCH_ASSOC));
	}

}
?>