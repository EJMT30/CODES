<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleread.css?<?=filemtime('styleread.css');?>">
    <link rel="stylesheet" href="navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@300&family=Alumni+Sans:wght@100&family=Concert+One&family=Days+One&family=Hind:wght@300&family=Koulen&family=M+PLUS+1+Code&family=Mitr:wght@200&family=Noto+Sans+Mono:wght@300&family=PT+Sans&family=Palanquin:wght@100&family=Poppins:wght@100&family=Saira+Extra+Condensed:wght@200&family=Shantell+Sans:wght@300&family=Sigmar&display=swap" rel="stylesheet"></head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <div class="container-fluid ps-5 pe-5 pt-2">
          <img src="assets/Youtube_logoW.png" alt="Logo" class="logo">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-white mx-2" href="homesearch.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white mx-2" href="readd.php">List of Youtubers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white mx-2" href="create.php">Create</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white mx-2" href="update.php">Update</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white mx-2" href="delete.php">Delete</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container mt-5 text-white">
        <div class="row justify-content-center">
          <div class="col-md-12 text-center">
            <h2 class="mt-5">Discover the top Filipino Youtuber</h2>
            <p class="mb-5">A list of your top favourite youtube influencers</p>
          </div>
        </div>
      </div>

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

			echo"
          <div id='holders'class='col-md-7 container my-2 text-white'>
            <div class='box row justify-content-center my-3'>
                <div class='col-md-4 text-center container-fluid'>

                <img src='data:image;base64,".$youtuberimage."'>
            
                </div>
                <div class='col-md-8'>

                    <h3>$channelname</h3>
                    <p>
                    <strong>ChannelHandle:</strong> $handle<br>
	                  <strong>Channel Link:</strong> <a href='$link'> $link<br></a>
			              <strong>Subscriber Count:</strong> $subcount<br>
			              <strong>Most Viewers:</strong> $mostviews<br>
			              <strong>Content Type:</strong> $contenttype<br>
			              <strong>Channel Creation Date:</strong> $channelcreated<br>
                    </p>

                 </div>
            </div>
          </div>
            ";
			
			$index++;
	}	
?>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>