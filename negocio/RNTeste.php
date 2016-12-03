<?php

class RNTeste extends Controller {
	

	public function __construct(){
		parent::__construct();
	}


	public function index(){
	
		$array = array('v1' => 2 , 'v2' => 9);
		if(!empty($_POST['nome'])){
			echo $_POST['email'];
			
		}
		$this->set('chupeta' , 'hodor');
		$this->set('consulta' , $array);

	}

	
	public function acao1(){

		

		$this->set('semnocao' , array() );


	}

	public function acao2(){
	
		echo  'Bruno' ;




	}



}?>