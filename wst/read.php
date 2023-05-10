<!DOCTYPE html>
<html>
<head>
	<title>Mainpage</title>
	<style>
		/*lahat ng buttons same level*/
		form{
			display: inline-block;
		}
		/*naka gitna lahat*/
		body{
			text-align: center;
		}
		/*lahat ng buttons, naka gold rounded corner walang borderline may space sa loob*/
		#function{
			background-color: gold;
			border: 0;
			border-radius: 10px;
			padding: 5px 10px;
		}
	</style>
	<script>
		//get ung value ni user na tinype tapos lalagay nya sa value na "value"
		function search(value){
		
		//pag walang tinype walang ididisplay sa label na may id na "test"
		if(value.length==0){
			document.getElementById("text").innerHTML="";
		}
		else{
			//json
			http = new XMLHttpRequest();
			http.onreadystatechange = function()
			{
				//pag gumana umabot sa 4th state, tapos may nakitang value na nasa xml run ung php code "suggest.php"
				if(http.readyState == 4 && http.status==200){
					//output sa label na may id na "text" ung output ni php
					document.getElementById("text").innerHTML = http.responseText;
				}
				else{
					//output ung value na tinype lang (lalabas lang to pag di complete ung status and/or hindi 200 ung status)
					document.getElementById("text").innerHTML = "Status Error";
				}
			};
			//ipasa ung variable find na may value ng "value" sa php
		http.open("GET", "suggest.php?find="+value,true);
		http.send();
		}
	}
	</script>
</head>
<body>
	
	<form action="create.php">
		<input type="submit" value="Create" id="function">
	</form>
	<form action="delete.php">
		<input type="submit" value="Delete" id="function">
	</form>
	<form action="update.php">
		<input type="submit" value="Update" id="function">
	</form>
	<form method="post" action="searchprocess.php">
		<input type="submit" value="Search" id="function">
		<input type="text" name="findme" onkeyup="search(this.value)">
	</form><br>
	<label id="text"></label>
	<br><br>
<?php
	$xml = new domdocument("1.0");// open class
	$xml->load("BSIT3EG2G4.xml"); // open xml file

	$youtubers = $xml->getElementsByTagName("youtuber"); //get youtuber values and save into array
	$index=0;//index para magiba iba kulay
	foreach($youtubers as $youtuber)// loop
	{		
		//kunin lahat ng data and store sa variables
			$handle = $youtuber->getAttribute("channelHandle");
            $link = $youtuber->getElementsByTagName("youtubeLink")->item(0)->nodeValue;
            $channelname = $youtuber->getElementsByTagName("channelName")->item(0)->nodeValue;
			$subcount = $youtuber->getElementsByTagName("subCount")->item(0)->nodeValue;
			$mostviews = $youtuber->getElementsByTagName("mostViews")->item(0)->nodeValue;
			$contenttype = $youtuber->getElementsByTagName("contentType")->item(0)->nodeValue;
			$channelcreated = $youtuber->getElementsByTagName("creationDate")->item(0)->nodeValue;
			$youtuberimage = $youtuber->getElementsByTagName("picture")->item(0)->nodeValue;

			
			//if pang even number na data, ibahin kulay
			if($index%2==0){
				//gagawing lightblue tapos white text
			echo "<div style=background-color:lightblue;color:white;>
			ChannelHandle: $handle<br>
	        Channel Link: $link<br>
		    Channel Name: $channelname<br>
			Subscriber Count: $subcount<br>
			Most Viewers: $mostviews<br>
			Content Type: $contenttype<br>
			Channel Creation Date: $channelcreated<br>
			<img src='data:image;base64,".$youtuberimage."' height='50' width='50'><br></div>";
			}
			//pag pang odd number ibahin kulay
			else{
				//gagawing blue with white text
			echo "<div style=background-color:blue;color:white;>
			ChannelHandle: $handle<br>
	        Channel Link: $link<br>
		    Channel Name: $channelname<br>
			Subscriber Count: $subcount<br>
			Most Viewers: $mostviews<br>
			Content Type: $contenttype<br>
			Channel Creation Date: $channelcreated<br>
			<img src='data:image;base64,".$youtuberimage."' height='50' width='50'><br></div>";
			}
			$index++;
	}	
?>
</body>
</html>
