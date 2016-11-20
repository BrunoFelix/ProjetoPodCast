<?php

class RNIndex extends Controller {
	

	public function index(){
	
		$podcasts = $this->executarRss('https://itunes.apple.com/br/rss/toppodcasts/limit=200/xml', 5);
		$this->set('podcasts' , $podcasts);
	}

	public function player(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$html = file_get_contents($_POST["url"]);
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


	private function executarRss($feed, $qtd){
		


		$rss = simplexml_load_file($feed);
			// limite de itens
		$limit = $qtd;
		// contador
		$count = 0;

		$podcasts = array();

		if($rss){

			foreach($rss->entry as $entry){

				preg_match_all( "@[<]img.*\\ssrc=([\"]((.)*?)[\"])\\s?@i", $entry->content, $matches);

				$entry->img = $matches[2][0];	

				$podcasts[] = $entry;

			}	

		}

		return $podcasts;
		

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