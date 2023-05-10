<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="search.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body style="background-color: black;">
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
			
            echo"
            
        <div class='container mt-5 text-white'>
            <div class='row justify-content-center'>
                <div class='col-md-6 text-center p-4'>
                    <h2>Record Found!</h2>
    
                    <p class='pt-4'>
    
                    <!-- wala pa yung image dito-->
                    
                    Youtube Link: $youtubeLink<br>
                    Channel Name: $channelname<br>
                    Subscriber Count: $subcount<br>
                    Most Viewers: $mostviews<br>
                    Content Type: $contenttype<br>
                    Channel Creation Date: $channelcreated<br>
    
                    </p>
                    <div>
                        <form action='homesearch.php'>
                            <input class='mt-3' type='submit' value='BACK'>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            ";

			break;
		}
	}
	//for no data found
	if($flag==0){

		echo"
            
        <div class='container mt-5 text-white'>
            <div class='row justify-content-center'>
                <div class='col-md-6 text-center p-4'>
                   
                    <h2>No record found</h2>
    
                    <div>
                        <form action='homesearch.php'>
                            <input class='mt-3' type='submit' value='BACK'>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            ";
	}
?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</body>
</html>