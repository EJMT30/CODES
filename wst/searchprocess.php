<?php
	
	$xml = new domdocument("1.0");//access domdocument class
	$xml->load("BSIT3EG2G4.xml");//open xml document
	$youtubers = $xml->getElementsByTagName("youtuber"); //get all youtuber tags and put to array

	$flag = 0; //index for found or not
	$search = $_POST["findme"]; //user input

	foreach($youtubers as $youtuber){ //looping condition
		$name = $youtuber->getElementsByTagName("channelName")->item(0)->nodeValue; // get youtube name 

		//we lower case all value to allow for non-case sensitive searching
		$loweredname = strtolower($name); //lower case name
		$loweredsearch = strtolower($search); //lower case search
		
		if ($loweredsearch == substr(($loweredname), 0, strlen($loweredsearch))) {
			//flag 1 - a data was found
			$flag = 1;
			//get link value
			$youtubeLink = $youtuber->getElementsByTagName("youtubeLink")->item(0)->nodeValue;
			//get name value
			$channelname = $youtuber->getElementsByTagName("channelName")->item(0)->nodeValue;
			//get subcount value
			$subcount = $youtuber->getElementsByTagName("subCount")->item(0)->nodeValue;
			//get views value
			$mostviews = $youtuber->getElementsByTagName("mostViews")->item(0)->nodeValue;
			//get content type
			$contenttype = $youtuber->getElementsByTagName("contentType")->item(0)->nodeValue;
			//get channel creation date
			$channelcreated = $youtuber->getElementsByTagName("channelCreated")->item(0)->nodeValue;
			//output all data found
			echo("Record Found!					<a href='read.php'>Go back?</a><br><br>");
			echo "Youtube Link: $youtubeLink<br>";
			echo "Channel Name: $channelname<br>";
			echo "Subscriber Count: $subcount<br>";
			echo "Most Viewers: $mostviews<br>";
			echo "Content Type: $contenttype<br>";
			echo "Channel Creation Date: $channelcreated<br>";

			break;
		}
	}
	//for no data found
	if($flag==0){
		echo("No records found				<a href='read.php'>Go back?</a>");
	}
?>

