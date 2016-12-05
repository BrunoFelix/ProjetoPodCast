<?php

class RNPlayer extends Controller {


	public function __construct(){
		parent::__construct();
	}


	public function index(){
	
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$html = file_get_contents(base64_decode($_GET["q"]));
			$players = $this->buscarplayer($html);
			$titulos = $this->buscartitulo($html);
			$album = $this->buscarAlbum($html);
			$artista = $this->buscarArtista($html);
			if ($album != $artista){
				$autor = $album[0] .' - '. $artista[0];
			}else{
				$autor = $album[0];
			}
			
			
			$this->set("players", $players);
			$this->set("titulos", $titulos);
			$this->set("autor", $autor);
		}else{
			header("location: ../"); //volta para tela inicial
		}

	}

	private function buscarPlayer($html){
		preg_match_all( "@[<]tr.*\\saudio-preview-url=([\"]((.)*?)[\"])\\s?@i", $html, $matches);

		return $matches[2];
	}

	private function buscarTitulo($html){
		preg_match_all( "@[<]tr.*\\spreview-title=([\"]((.)*?)[\"])\\s?@i", $html, $matches);
		
		return $matches[2];
	}

	private function buscarAlbum($html){
		preg_match_all( "@[<]tr.*\\spreview-album=([\"]((.)*?)[\"])\\s?@i", $html, $matches);

		return $matches[2];		
	}

	private function buscarArtista($html){
		preg_match_all( "@[<]tr.*\\spreview-artist=([\"]((.)*?)[\"])\\s?@i", $html, $matches);

		return $matches[2];		
	}
}

?>