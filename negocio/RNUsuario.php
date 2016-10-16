<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		require_once('../dados/DAOUsuario.php');
		require_once('../basica/Usuario.php');

		$login = $_POST["username"];
		$senha = $_POST["password"];

		if (empty($login) || empty($senha)){
			exit;
		}

		$usuario = new Usuario();

		$usuario->setLogin($login);
		$usuario->setSenha($senha);

		$daousuario = new DaoUsuario();

		$result = $daousuario->pesquisar($usuario);

		echo var_dump($result);

		session_start();


		if (!empty($result)){
			
			$_SESSION['usuario'] = $result;

			header("location:../gui/dist/index2.php");
		}else{
			$_SESSION['mensagem_login'] = 'Usuário e/ou Senha incorretos!';
			header("location:../gui/dist/login.php");	 
		}


		
	}

?>