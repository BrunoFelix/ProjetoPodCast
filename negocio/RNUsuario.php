<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		require_once('../dados/DAOUsuario.php');
		require_once('../basica/Usuario.php');

		if (isset($_POST["logar"])){
			logar();
		}else if (isset($_POST["cadastrar"])){
			//cadastrar();
			cadastrar();
		}else{
			echo "Comando Inválido!";
		}
	}

	function cadastrar(){
		$nome = $_POST["firstname"];
		$sobrenome = $_POST["lastname"];
		$login = $_POST["email"];
		$senha = $_POST["password"];

		if (empty($login) || empty($senha) || empty($nome) || empty($sobrenome)){
			exit;
		}

		$usuario = new Usuario();

		$usuario->setNome($nome);
		$usuario->setSobrenome($sobrenome);
		$usuario->setLogin($login);
		$usuario->setSenha($senha);

		$daousuario = new DaoUsuario();

		$result = $daousuario->cadastrar($usuario);

		echo var_dump($result);

		session_start();

		if (!empty($result)){
			
			$_SESSION['usuario'] = $usuario;

			header("location:../gui/perfil.php");
		} /*else{
			$_SESSION['mensagem_login'] = 'Usuário e/ou Senha incorretos!';
			header("location:../gui/dist/login.php");	 
		}*/
	}

	function logar(){
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

			header("location:../gui/perfil.php");
		}else{
			$_SESSION['mensagem_login'] = 'Usuário e/ou Senha incorretos!';
			header("location:../gui/login.php");	 
		}
	}
?>