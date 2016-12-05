<?php
	echo '<table class="tabela_player" id="tabela_player">
		  	<tr>
		  		<div name="titulo" id="titulo">
					<h3>'.$result[0]["autor"].'</h3>
		  		</div>
		  	</tr>';
		foreach($result as $key => $controle){
			echo '<tr class="tabela_player_tr">
					<td>
						<div name="player" class="player">
				  			<div name='.$controle["titulo"].' id='.$controle["titulo"].'>
								<h1>'.$controle["titulo"].'</h1>
								<audio src="'.$controle["link_player"].'" controls> </audio>
				  			</div>
				  		</div>
			  		</td>
		  		</tr>
			  	
			';
		}
		echo '</table>
			  <div id="pageNav"></div>';
?>
