<?php

	if (isset($usuario)){

		echo '	<div class="listar" id="listar" name="listar">
			<table class="tabela_player" id="tabela_player">
		  	<tr>
		  		<div name="titulo" id="titulo">
					<h3>'.$autor.'</h3>
		  		</div>
		  	</tr>';
		foreach($players as $key => $controle){
			echo '<tr class="tabela_player_tr">
						<td>
							<form id="'.$key.'" name="'.$key.'" action="usuario/cadastrar_favorito" method="POST">
								<div name="player" class="player">
						  			<div name='.$titulos[$key].' id='.$titulos[$key].'>
										<h1>'.$titulos[$key].'</h1>
										<audio class="audio_player" src="'.$controle.'" controls> </audio>
						  			</div>
						  			<input type="hidden" id="link_player" name="link_player" value="'.$controle.'" />
						  			<input type="hidden" id="titulo" name="titulo" value="'.$titulos[$key].'" />
						  			<input type="hidden" id="autor" name="autor" value="'.$autor.'" />
						  			<input type="submit" value="Adicionar aos favoritos" class="input_player" id="input_player"/>
						  			 
						  		</div>
						  	</form>
				  		</td>
		  			</tr>	 
			';
		}
		echo '</table>
			  <div id="pageNav" class="pageNav"></div>
			  </div>';
	}else{
		echo '	<div class="listar" id="listar" name="listar">
			<table class="tabela_player" id="tabela_player">
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
									<audio class="audio_player" src="'.$controle.'" controls> </audio>
					  			</div>					  			 
					  		</div>
				  		</td>
		  			</tr>	 
			';
		}
		echo '</table>
			  <div id="pageNav" class="pageNav"></div>
			  </div>';
	}
?>
