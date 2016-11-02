<?php

header( "Content-type: text/html; charset=utf-8" );

// permite requisições a urls externas
ini_set('allow_url_fopen', 1);
ini_set('allow_url_include', 1);

// caminho do feed do meu blog
executarRss('https://jovemnerd.com.br/feed-nerdcast/', 5);
executarRss('https://mundopodcast.com.br/feed/', 5);
executarRss('http://www.portalcafebrasil.com.br/todos/podcasts/feed/', 5);

function executarRss($feed, $qtd){
	$rss = simplexml_load_file($feed);
		// limite de itens
	$limit = $qtd;
	// contador
	$count = 0;

	if($rss)
	{
		echo '<br>';
		echo '<br>';
		echo $rss->channel->title;
		echo '<br>';
		echo '<br>';
		echo '<br>';
	    foreach ( $rss->channel->item as $item )
	    {
	        
	    	//echo $item->enclosure["url"];
	        // formata e imprime uma string
	        echo $item->title;
	        echo '<br/>';
	 		echo '<audio src="'.$item->enclosure["url"].'" controls="controls" loop preload="preload" title="'.$item->title.'">  </audio>';
	        echo '<br/>';
	        // incrementamos a variável $count
	        $count++;
	        // caso nosso contador seja igual ao limite paramos a iteração
	        if($count == $limit) break;
	    }
	}
}

 //$url = "http://www.portalcafebrasil.com.br/tools/lidercast.xml";
 /*$url = "https://jovemnerd.com.br/feed-nerdcast/";

 $ch = curl_init(); 
 curl_setopt($ch, CURLOPT_URL, $url); 
 curl_setopt($ch, CURLOPT_HEADER, false); 
 curl_setopt($ch, CURLOPT_NOBODY, false); // remove body 
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
 $head = curl_exec($ch); 
 // $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
 curl_close($ch); 


//$xml = simplexml_load_string($head);
/*echo '<pre>';
var_dump($head);
die;*/	
 /*
 header('Content-Type:text/html; charset=utf-8');
 $xml = simplexml_load_string($head);
 echo '<pre>';
 foreach($xml->channel->item as $item ){
 	echo $item->title;
 	echo '<br/>';
 	echo '<audio src="'.$item->guid.'" controls="controls" loop preload="preload" title="'.$item->title.'">  </audio>';
 	echo '<br/>';
 }
 die;





*/



?>
