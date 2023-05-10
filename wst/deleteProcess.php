<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="search.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-color: black">
	

<?php
$xml = new domdocument("1.0");
$xml->load("BSIT3EG2G4.xml"); // change filename
//gets selected link
$searchid = $_POST["links"];
//saves all data into array
$youtubers = $xml->getElementsByTagName("youtuber");

	foreach ($youtubers as $youtuber) {//loops through all the data
		$id = $youtuber->getElementsByTagName("youtubeLink")->item(0)->nodeValue;//get youtubelink
		//search if $id is same as selected link
		if ($searchid == $id) {
			$xml->getElementsByTagName("youtubers")->item(0)->removeChild($youtuber);//removes data
			$xml->save("BSIT3EG2G4.xml"); // save data
			echo "
		<div class='container mt-5 text-white'>
            <div class='row justify-content-center'>
                <div class='col-md-6 text-center p-4'>
                   
                    <h2>Record Deleted</h2>
    
                    <div>
                        <form action='delete.php'>
                            <input class='mt-3' type='submit' value='BACK'>
                        </form>
                    </div>
                </div>
            </div>
        </div>";

			break;
		}
	}

?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


