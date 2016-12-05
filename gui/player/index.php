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
							<form id="'.$key.'" name="'.$key.'" action="javascript: func('.$key.')">
								<div name="player" class="player">
						  			<div name='.$titulos[$key].' id='.$titulos[$key].'>
										<h1>'.$titulos[$key].'</h1>
										<audio src="'.$controle.'" controls> </audio>
						  			</div>
						  			<input type="hidden" id="link_player'.$key.'" name="link_player'.$key.'" value="'.$controle.'" />
						  			<input type="hidden" id="titulo'.$key.'" name="titulo'.$key.'" value="'.$titulos[$key].'" />
						  			<input type="hidden" id="autor'.$key.'" name="autor'.$key.'" value="'.$autor.'" />
						  			<input type="submit" value="Adicionar aos favoritos"/>
						  			 
						  		</div>
						  	</form>
				  		</td>
		  			</tr>	 
			';
		}
		echo '</table>
			  <div id="pageNav"></div>';
?>
