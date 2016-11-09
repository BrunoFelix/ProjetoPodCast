<?php

	echo "<pre>";
	echo($autor);
	echo "<br>";
	echo "<br>";
	foreach($players as $key => $controle){
		echo $titulos[$key];
		echo "<br>";
		echo '<audio src="'.$controle.'" controls> </audio>';
		echo "<br>";
	}
?>
