<?php
//access domdocument class
	$xml = new domdocument("1.0");
	$xml->load("BSIT3EG2G4.xml");
	//get ung xml file ^
	//get ung tag na channelname
	$lists = $xml->getElementsByTagName("channelName");
	
	//touper para hindi case sensitive
	//request ung value na find from html (laman nung find ung sinearch)
	$suggest = strtoupper($_REQUEST["find"]);

	//set value ni hint to blank muna
	$hint = "";

	//index kung may nahanap or wala
	$flag=0;

	//pag hindi null gawin mo function
	if($suggest!=null){
		//find sa tag lists ung hinahanap
	foreach($lists as $list)
	{	
		//store ung list sa channel
		$channel = $list->nodeValue;

		//uppercase ung channel name tapos store sa $channelname 
		$channelname = strtoupper($channel);
		if ($suggest == substr(($channelname), 0, strlen($suggest))) {
			if($hint=="") //if $hint has no value yet simply copy the matching name
				$hint = $channel;
			else //if there is an existing value already,append next names with comma
				$hint .= ", $channel";
		}
	}

	if($hint=="") //if no matching name 
		echo "No suggestion.";
	else //else display updated value of $hint
		echo $hint;
	}

?>