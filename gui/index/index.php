<?php




		foreach($podcasts as $entry){
	
			echo '<div class="podcast">
				 	<img class="logo-podcasts" src="'. $entry->img .'">
					  	<div class = "logo-podcasts-titulo">'.$entry->title.'
						</div>
					</IMG>
				  </div>';


		}
?>
