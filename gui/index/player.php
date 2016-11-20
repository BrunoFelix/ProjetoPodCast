<?php
	echo '<table class="tabela_player" id="tabela_player">
		  	<tr>
		  		<div name="titulo" id="titulo">
					<h3>'.$autor.'</h3>
		  		</div>
		  	</tr>';
		foreach($players as $key => $controle){
			echo '<tr class="tabela_player_tr">
					<td>
						<div name="player" class="player">
				  			<div name='.$titulos[$key].' id='.$titulos[$key].'>
								<h1>'.$titulos[$key].'</h1>
								<audio src="'.$controle.'" controls> </audio>
				  			</div>
				  		</div>
			  		</td>
		  		</tr>
			  	
			';
		}
		echo '</table>
			  <div id="pageNav"></div>';
?>
