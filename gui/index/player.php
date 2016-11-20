<?php
	echo '<div name="titulo" id="titulo">
			<h3>'.$autor.'</h3>
		  </div>';
	foreach($players as $key => $controle){
		echo '<div name="player" class="player">
			  	<div name='.$titulos[$key].' id='.$titulos[$key].'>
					<h1>'.$titulos[$key].'</h1>
					<audio src="'.$controle.'" controls> </audio>
			  	</div>
			  </div>';
	}
?>
