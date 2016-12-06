<?php
class FileLoader{

	
	
	public function loader($tela , $pasta , $dirRoot = 'gui') {
	
		$rootDir = explode('\\' ,__DIR__ );
		array_pop($rootDir);
		$rootDir = implode('\\', $rootDir);
		 
		$path = $rootDir.'\\'.$dirRoot.'\\'.$pasta;


		$valores = scandir($path);
		
		$caminho = "";
		
		foreach ($valores  as $valor) {
			 
			if( $valor != '.' && $valor != '..'  ){
				$nameExt = array();
				$nameExt = explode('.', $valor);
				$nameFile = current($nameExt);
				
				if($nameFile == $tela){
					$caminho =  $path.'\\'.$nameFile . '.php';
					break;
				}
			}
			 
	  }
	  
	  return $caminho;
	
		
	
	}
	
	
}