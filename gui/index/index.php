<?php
	foreach($podcasts as $entry){
		echo '<a href="javascript: submitform()" name="'.$entry->title.'" id="'.$entry->title.'">
				<div class="podcast" name="'.$entry->title.'" id="'.$entry->title.'">
			  		<form name="formulario" id="formulario" action="'.$pasta.'/player" method="POST">
					  	<img for="enviar" class="logo-podcasts" src="'. $entry->img .'">
							<div for="enviar" class = "logo-podcasts-titulo">'.$entry->title.'
							</div>
						</img>
						<input type="hidden" name="url" id="url" value="'.$entry->link["href"].'"/>
						</button>
					</form>	
			 	 </div>
			  </a>';
		}
?>
