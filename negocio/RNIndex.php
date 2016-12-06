<?php

class RNIndex extends Controller {


	public function __construct(){
		parent::__construct();
	}


	public function index(){
	
		$podcasts = $this->executarRss('https://itunes.apple.com/br/rss/toppodcasts/limit=200/xml', 5);
		$this->set('podcasts' , $podcasts);

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

	public function alterar(){
		header("location: ../usuario/alterar");
	}

	public function favoritos(){
		header("location: ../usuario/favoritos");
	}

}

?>