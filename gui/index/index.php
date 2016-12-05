<?php
	foreach($podcasts as $entry){
		echo '<a href="javascript: submitform(\''.$entry->title.'\')" name="'.$entry->title.'" id="'.$entry->title.'">
				<div class="podcast" name="'.$entry->title.'" id="'.$entry->title.'">
			  		<form name="'.$entry->title.'" id="'.$entry->title.'" action="player" method="GET">
					  	<img for="enviar" class="logo-podcasts" src="'. $entry->img .'">
							<div for="enviar" class = "logo-podcasts-titulo">'.$entry->title.'
							</div>
						</img>
						<input type="hidden" name="q" id="q" value="'.base64_encode($entry->link["href"]).'"/>
						</button>
					</form>	
			 	 </div>
			  </a>';
		}
?>
