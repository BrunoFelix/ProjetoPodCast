<?php

	$titulo = "";

	if (!empty($result)){
		foreach($result as $key => $controle){

			if ($titulo != $controle["autor"]){
				echo '<table class="tabela_player" id="tabela_player">
			  	<tr>
			  		<div name="titulo" id="titulo">
						<h3>'.$controle["autor"].'</h3>
			  		</div>
			  	</tr>';
			}

			echo '<tr class="tabela_player_tr">
					<td>
						<form id="'.$key.'" name="'.$key.'" action="excluir_favorito" method="POST">
							<div name="player" class="player">
					  			<div name='.$controle["titulo"].' id='.$controle["titulo"].'>
									<h1>'.$controle["titulo"].'</h1>
									<audio class="audio_player" src="'.$controle["link_player"].'" controls> </audio>
					  			</div>
					  			<input type="hidden" id="id" name="id" value="'.$controle["id"].'" />
					  			<input type="submit" value="Remover dos favoritos" class="input_player" id="input_player"/>
					  		</div>
				  		</form>
			  		</td>
		  		</tr>
			  	
			';

			$titulo = $controle["autor"];
		}
		/*echo '</table>
			  <div id="pageNav"></div>';*/
		}else{
			echo '<table class="tabela_player" id="tabela_player">
		  	<tr>
		  		<div name="titulo" id="titulo">
					<h3>Você não possui nenhum favorito!</h3>
		  		</div>
		  	</tr>';
		}
?>