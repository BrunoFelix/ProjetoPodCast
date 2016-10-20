<?php

class ClassAutoloader {
        
		private $directories = array();

        public function __construct($directories = array()) {
            	
            $this->directories = $directories;  

            spl_autoload_register(array($this, 'loader'));
        }
        private function loader($className) {

        	$rootDir = explode('\\' ,__DIR__ );
        	array_pop($rootDir);
        	$rootDir = implode('\\', $rootDir);	
        	
        	foreach ($this->directories as $dir) {
        			
        		 $path = $rootDir.'\\'.$dir;	

        		
        		$valores = scandir($path);

        		foreach ($valores  as $valor) {
        			
        			if( $valor != '.' && $valor != '..'  ){
						$nameExt = array();	
						$nameExt = explode('.', $valor);
        				$nameFile = current($nameExt);
        				if($nameFile == $className){
							
							//echo '../'.$dir.'/'.$className . '.php';

							require_once $dir.'/'.$className . '.php';
        					break;
        				} 
        			}	
        			
        		}

        	}	

        }
}
?>