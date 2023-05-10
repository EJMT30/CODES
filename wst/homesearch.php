


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylehome.css?<?=filemtime('styleread.css');?>">
    <link rel="stylesheet" href="navbar.css?<?=filemtime('styleread.css');?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@300&family=Alumni+Sans:wght@100&family=Concert+One&family=Days+One&family=Hind:wght@300&family=Koulen&family=M+PLUS+1+Code&family=Mitr:wght@200&family=PT+Sans&family=Palanquin:wght@100&family=Sigmar&display=swap" rel="stylesheet">
    <style>
    .carousel-item img {
      border-radius: 20px;
    }
  </style>
<script>
		
		function search(value){
		
		
		if(value.length==0){
			document.getElementById("text").innerHTML="";
		}
		else{
			
			http = new XMLHttpRequest();
			http.onreadystatechange = function()
			{
				
				if(http.readyState == 4 && http.status==200){
					
					document.getElementById("text").innerHTML = http.responseText;
				}
				else{
					
					document.getElementById("text").innerHTML = "Status Error";
				}
			};
			
		http.open("GET", "suggest.php?find="+value,true);
		http.send();
		}
	}
	</script>

</head>
<body class="pede">
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
        <div class="col-md-6 text-center">

          <form class="form-inline" method="POST" action="">
            <div class="input-group">
              <input type="text" class="form-control" name="findme" onkeyup="search(this.value)" placeholder="Search" required>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary bg-dark text-white"  id="function" data-bs-toggle="modal" data-bs-target="#exampleModal" name="hello">Search</button>
                
              </div>
            </div>
          </form>
          <label class="mt-3" id="text"></label>
          
          
        </div>
    </div>
  </div>

  <div class="row justify-content-center">
      <div class="col-md-12 text-center">
        <h6 class="mt-5 text-white">Suggested Youtuber Influencers</h6>
      </div>
  </div>

  <div class="container mt-5">
    <div id="gallery" class="carousel slide" data-bs-ride="carousel">
      
     
      <div class="carousel-indicators"> 
        <button type="button" data-bs-target="#gallery" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#gallery" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#gallery" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      
      
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/1.png" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="assets/2.png" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="assets/3.png" class="d-block w-100">
        </div>
      </div>
      
      <!-- These are the navigation buttons previous and next. -->
      <button class="carousel-control-prev" type="button" data-bs-target="#gallery" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#gallery" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  

  <div class="d-flex justify-content-center my-4">
    <form action="readd.php">

        <button class="clkhere" type="submit" >Click here for more</button><br>

    </form>
  </div>

<!-- modal -->
  <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='myform my-5'>
        <div class='row justify-content-center bg-dark'>
            <?php

            if(isset($_POST["findme"]))
            {

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
                        
                        <h1 class='text-center'>Record Found!</h1>
                        <p class='text-white'>
                    
                          <!-- wala pa yung image dito-->
                          Youtube Link: $youtubeLink<br>
                          Channel Name: $channelname<br>
                          Subscriber Count: $subcount<br>
                          Most Viewers: $mostviews<br>
                          Content Type: $contenttype<br>
                          Channel Creation Date: $channelcreated<br>
                    
                        </p>
                        <button type='button' data-dismiss='modal' class='btnpo mt-3'>OK</button>

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

            }
              
            ?>
        
        </div>
      </div>
    </div>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

