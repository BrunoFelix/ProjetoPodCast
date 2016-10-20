<?php
class Controller {
	
	public function set($nome , $valor){
		global $variables;
		$variables[$nome] = $valor;
	}

}