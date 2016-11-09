<?php
	

     $uri =  $_SERVER["REQUEST_URI"];
     $valores = split('/', $uri);
     $pasta = "" ;
	 $tela = "index";	
     $variables = array();


     if(!empty($valores)){

		if(count($valores) > 2){

			$input = array_splice($valores, 2);

			$chamadaMetodo  = "";		

			if(count($input) == 1)
				array_push($input, "");	
			

			foreach ($input as $key =>  $value) {
			
				if(empty($value))
					$value = "index";

				switch ($key) {
					case 0: $chamadaMetodo  .= '$obj  = new  RN'.ucfirst($value).'();'; $pasta = $value;  break;
					case 1: 

						$action = "index";
						if($value != ""){
							$action = $value;
							$tela = $value;
						}
						
							
						
						$chamadaMetodo  .= '$obj->'.$action.'();'; 
					break;
					default:break;
				}


			}	

	


			if(empty($pasta))
				$pasta = "index";

			eval($chamadaMetodo);
			
			
			if(!empty($variables)){
				foreach($variables as $nome => $valor){
					//var_dump(expression)
					$$nome = $valor;
			
			
				}
			}

		}     		


     }

     
     

	 require_once 'gui/template.php';
 ?>

