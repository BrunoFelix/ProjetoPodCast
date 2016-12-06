<?php
	
	class RNUsuario extends Controller {

		
		public function __construct(){
			parent::__construct();
		}



		public function index(){
			header("location: ../");
		}

		public function cadastrar(){
			$this->set('MENSAGEM_CADASTRO' , '');

			require_once('dados/DAOUsuario.php');
			require_once('basica/Usuario.php');

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$nome = $_POST["firstname"];
				$sobrenome = $_POST["lastname"];
				$login = $_POST["email"];
				$senha = $_POST["password"];

				if (empty($login) || empty($senha) || empty($nome) || empty($sobrenome)){
					//$this->set('MENSAGEM_CADASTRO' , 'Todos os campos precisam ser preenchidos!');
					exit;
				}

				$daousuario = new DaoUsuario();
	
				$usuariovalida = new Usuario();

				$usuariovalida->setLogin($login);

				$result2 = $daousuario->pesquisar($usuariovalida);


				if (!empty($result2)){
					$this->set('MENSAGEM_CADASTRO' , 'Email já cadastrado!');
				}else{

					$usuario = new Usuario();

					$usuario->setNome($nome);
					$usuario->setSobrenome($sobrenome);
					$usuario->setLogin($login);
					$usuario->setSenha($senha);

					$daousuario->cadastrar($usuario);

					$result = $daousuario->pesquisar($usuario);

					//echo var_dump($result);

					if (!empty($result)){
							
							$this->startLogin($result);

							header("location:../");
					}else{
						$this->set('MENSAGEM_CADASTRO' , 'Email e/ou Senha incorretos!');
					}
				}
			}
		}

		public function alterar(){
			if(!$this->isLoggedUser()){
				header("location: index");
			}	

			$this->set('MENSAGEM_ALTERAR_CADASTRO' , '');

			require_once('dados/DAOUsuario.php');
			require_once('basica/Usuario.php');

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$id = $_POST["id"];
				$nome = $_POST["firstname"];
				$sobrenome = $_POST["lastname"];
				$login = $_POST["email"];
				$senha = $_POST["password"];

				if (empty($login) || empty($senha) || empty($nome) || empty($sobrenome)){
					//$this->set('MENSAGEM_CADASTRO' , 'Todos os campos precisam ser preenchidos!');
					exit;
				}

				$daousuario = new DaoUsuario();
	
				$usuariovalida = new Usuario();

				$usuariovalida->setId($id);
				$usuariovalida->setLogin($login);

				$result2 = $daousuario->pesquisar($usuariovalida, 'true');


				if (!empty($result2)){
					$this->set('MENSAGEM_ALTERAR_CADASTRO' , 'Email já cadastrado!');
				}else{

					$usuario = new Usuario();

					$usuario->setId($id);
					$usuario->setNome($nome);
					$usuario->setSobrenome($sobrenome);
					$usuario->setLogin($login);
					$usuario->setSenha($senha);

					$daousuario->alterar($usuario);

					$result = $daousuario->pesquisar($usuario);

					//echo var_dump($result);

					if (!empty($result)){
							
							$this->startLogin($result);

							header("location:../");
					}else{
						$this->set('MENSAGEM_ALTERAR_CADASTRO' , 'Email e/ou Senha incorretos!');
					}
				}
			}
		}
		public function logar(){

			$this->set('MENSAGEM_LOGIN' , '');

			require_once('dados/DAOUsuario.php');
			require_once('basica/Usuario.php');

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$login = $_POST["username"];
				$senha = $_POST["password"];

				if (empty($login) || empty($senha)){
					//$this->set('MENSAGEM_CADASTRO' , 'Todos os campos precisam ser preenchidos!');
					exit;
				}

				$usuario = new Usuario();

				$usuario->setLogin($login);
				$usuario->setSenha($senha);

				$daousuario = new DaoUsuario();

				$result = $daousuario->pesquisar($usuario);

				
				
				
				if (!empty($result)){
					
					$usuario->setId($result[0]['id']);
					$returnFavoritos =  $daousuario->getFavoritos($usuario);
					
					
					$this->startLogin($result , $returnFavoritos );

					header("location:../");
				}else{
					$this->set('MENSAGEM_LOGIN' , 'Usuário e/ou Senha incorretos!');
				}
			}
		}

		public function sair(){
			$this->stopLogin();
			header("location:../");
		}

		public function cadastrar_favorito(){
			if(!$this->isLoggedUser()){
				header("location: index");
			}	

			/*$msg = "Dados enviados:\r\n";			
			    $msg .= $_POST["link_player"];
			
			echo $msg;*/

			$this->set('MENSAGEM_CADASTRO_FAVORITO' , '');

			require_once('dados/DAOFavorito.php');
			require_once('basica/Favorito.php');

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				
				$link_player = $_POST["link_player"];
				$titulo = $_POST["titulo"];
				$autor = $_POST["autor"];
				$id_usuario = $this->getIdUser();

				if (empty($link_player) || empty($titulo) || empty($autor) || empty($id_usuario)){
					//$this->set('MENSAGEM_CADASTRO_FAVORITO' , 'Todos os campos precisam ser preenchidos!');
					exit;
				}

				$favorito = new favorito();

				$favorito->setLinkPlayer($link_player);
				$favorito->setTitulo($titulo);
				$favorito->setAutor($autor);
				$favorito->setIdUsuario($id_usuario);

				$daofavorito = new daoFavorito();

				try{
					$daofavorito->cadastrar($favorito);

					
					header("location: ../usuario/favoritos");
					

				}catch(Exception $ex){
					header("location: ../usuario/favoritos");

					//$this->set('MENSAGEM_LOGIN' , 'Erro ao adicionar nos favoritos!');
				}
					
			}

		}

		public function alterar_favorito(){


		}

		public function excluir_favorito(){
			if(!$this->isLoggedUser()){
				header("location: index");
			}	

			$this->set('MENSAGEM_EXCLUIR_FAVORITO' , '');

			require_once('dados/DAOFavorito.php');
			require_once('basica/Favorito.php');

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$id = $_POST["id"];

				$favorito = new favorito();

				$favorito->setId($id);

				$daofavorito = new daoFavorito();


				try{
					$daofavorito->excluir($favorito);

					$result = $daofavorito->pesquisar($favorito);

					header("location: ../usuario/favoritos");

				}catch(Exception $ex){
					$msg = "Erro ao adicionado aos favoritos!";
					echo $msg;

					//$this->set('MENSAGEM_LOGIN' , 'Erro ao adicionar nos favoritos!');
				}
			}

		}

		public function favoritos(){
			if(!$this->isLoggedUser()){
				header("location: index");
			}

			$this->set('MENSAGEM_FAVORITO' , '');

			if (!empty($this->getIdUser())){

				require_once('dados/DAOFavorito.php');
				require_once('basica/Favorito.php');

				$favorito = new favorito();
				$favorito->setIdUsuario($this->getIdUser());
				$daofavorito = new daoFavorito();
				$result = $daofavorito->pesquisar($favorito);

				$this->set("result", $result);
				
				if (!empty($result)){
					$this->set("result", $result);
				}else{
					$this->set('MENSAGEM_LOGIN' , 'Você não possui favoritos!');
				}
			}
		}

		public function teste(){

			$retorno['msg'] = '';	
			if(!empty($_POST))
				$retorno['msg'] = $_POST['teste'];
			//header('');
			echo json_encode($retorno);
			exit; 
		}

		public function perfil(){
			var_dump($this->getUser());
			die;

		}

	}
	/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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

		try
		{
			$daousuario->cadastrar($usuario);

			$result = $daousuario->pesquisar($usuario);

			//echo var_dump($result);

			session_start();

			
				
				$_SESSION['usuario'] = $result;

				header("location:../gui/perfil.php");
			 /*else{
				$_SESSION['mensagem_login'] = 'Usuário e/ou Senha incorretos!';
				header("location:../gui/dist/login.php");	 
			}*/
	/*	}
		catch (Exception $e)
		{
			echo 'erro';
		}
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
	}*/
?>