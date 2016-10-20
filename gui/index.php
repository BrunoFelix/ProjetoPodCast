<?php


 $url = "http://www.portalcafebrasil.com.br/tools/lidercast.xml";
 //$url = "https://jovemnerd.com.br/feed-nerdcast/";

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









?>
