<?php
	foreach($podcasts as $entry){
		echo '<div class="podcast">
			  	<form action="'.$pasta.'/player" method="POST">
				  	<button>
					  	<img class="logo-podcasts" src="'. $entry->img .'">
							<div class = "logo-podcasts-titulo">'.$entry->title.'
							</div>
						</img>
					</button>
					<input type="hidden" name="url" id="url" value="'.$entry->link["href"].'"/>
				</form>
			  </div>';
		}
?>
