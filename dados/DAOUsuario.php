<?php
require_once('basica/Usuario.php');
require_once('iDAOUsuario.php');
require_once('util/conexao.php');

class DaoUsuario implements iDAOUsuario
{
	function __construct(){
	}


	public function cadastrar(Usuario $u){

		$comando = "insert into tb_usuario (nome, sobrenome, login, senha) values (:nome, :sobrenome, :login, :senha)";

		$stmt = Conexao::getInstance()->prepare($comando);

		$run = $stmt->execute(array(
    			':nome' => $u->getNome(),
    			':sobrenome' => $u->getSobrenome(),
    			':login' => $u->getLogin(),
				':senha' => $u->getSenha()
 		));
	}
	public function alterar(Usuario $u){
		$comando = "update tb_usuario set nome = :nome, sobrenome = :sobrenome, login = :login, senha = :senha where id = :id";

		$stmt = Conexao::getInstance()->prepare($comando);

		$run = $stmt->execute(array(
    			':nome' => $u->getNome(),
    			':sobrenome' => $u->getSobrenome(),
    			':login' => $u->getLogin(),
				':senha' => $u->getSenha(),
				':id' => $u->getId()
 		));
	}
	public function excluir(Usuario $u){

	}
	public function pesquisar(Usuario $u, $alt='false'){

		$comando = 'select id, nome, sobrenome, login, senha from tb_usuario ';

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
		
		if (!empty($u->getEmail())){
			if (empty($where)){
				$where = ' where email = :email';
			}else{
				$where = $where . ' and email = :email';
			}
		}

		if ($alt == 'false'){
			if (!empty($u->getId())){
				if (empty($where)){
					$where = ' where id = :id';
				}else{
					$where = $where . ' and id = :id';
				}
			}

		}else{
			if (!empty($u->getId())){
				if (empty($where)){
					$where = ' where id <> :id';
				}else{
					$where = $where . ' and id <> :id';
				}
			}
		}


		$stmt = Conexao::getInstance()->prepare($comando . $where);

		if (!empty($u->getLogin()))
			$stmt->bindValue(':login', $u->getLogin());

		if (!empty($u->getSenha()))
			$stmt->bindValue(':senha', $u->getSenha());

		if (!empty($u->getId()))
			$stmt->bindValue(':id', $u->getId());

		if (!empty($u->getEmail()))
			$stmt->bindValue(':email', $u->getEmail());

		$run = $stmt->execute();
		return ($stmt->fetchAll(PDO::FETCH_ASSOC));
	}

}

?>