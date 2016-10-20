<?php

class RNTeste extends Controller {
	

	public function index(){

		
		$array = array('v1' => 2 , 'v2' => 9);
		
		$this->set('chupeta' , 'hodor');
		$this->set('consulta' , $array);

	}

	public function acao1(){

		echo  'Eudes';

	


	}

	public function acao2(){
	
		echo  'Bruno' ;




	}



}?>