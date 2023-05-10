<?php
$xml = new domdocument("1.0");
$xml->load("BSIT3EG2G4.xml");
$findme = $_REQUEST['details'];
$flag=0;
$youtubers = $xml->getElementsByTagName("youtuber");

foreach($youtubers as $youtuber){
	$link = $youtuber->getElementsByTagName("youtubeLink")->item(0)->nodeValue;
	if($link==$findme){
		$flag=1;
		echo"tite";
		break;
	}
	else{
		echo"wala";
	}
	if($flag==0){
		echo"wala dito";
	}
}
?>