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
$xml=new domdocument("1.0");
$xml->formatOutput = true;
$xml-> preserveWhiteSpace = false;
$xml->load("BSIT3EG2G4.xml");

//gets all input data
$searchid = $_POST["youtubelink"];//selector input
$channelName = $_POST["newName"];
$subCount = $_POST["newCount"];
$mostViews = $_POST["newView"];
$contentType = $_POST["newContent"];
$handle = $_POST["newHandle"];
$picture = $_POST["newPic"];//for image
$flag = 0;

$youtubers = $xml->getElementsByTagName("youtuber");//gets youtube tag and makes the array youtubers
foreach($youtubers as $youtuber){
    //search for youtubeLink tag
    $link = $youtuber->getElementsByTagName("youtubeLink")->item(0)->nodeValue;
    
    //compares link and selected link if found
    if ($searchid==$link){
        $flag = 1;//link is found
        // $date = $youtuber->getElementsByTagName("creationDate")->item(0)->nodeValue; remove comment when all data is created

        $date = $youtuber->getElementsByTagName("creationDate")->item(0)->nodeValue;

        $newnode = $xml->createElement("youtuber"); // makes new node
        $youtubeLink = $xml->createElement("youtubeLink",$searchid); // sets selected link as new link

        $cName = $xml->createElement("channelName",$channelName); //saves new inputs
        $sCount = $xml->createElement("subCount",$subCount);
        $mViews = $xml->createElement("mostViews",$mostViews);
        $cType = $xml->createElement("contentType",$contentType);
        $cdatecreated = $xml->createElement("creationDate",$date);

        

        if($picture==null){
            $oldpicture = $youtuber->getElementsByTagName("picture")->item(0)->nodeValue;
            $pic = $xml->createElement("picture",$oldpicture); 
        }
        else{
            $pic = $xml->createElement("picture"); 
            $imageData = file_get_contents($picture);
            $base64 = base64_encode($imageData);
            $cdata = $xml->createCDATASection($base64);
            $pic->appendChild($cdata);
        }
        

        $newnode->appendChild($youtubeLink); //connects new input into new node
        $newnode->appendChild($cName);
        $newnode->appendChild($sCount);
        $newnode->appendChild($mViews);
        $newnode->appendChild($cType);
        $newnode->appendChild($cdatecreated);
        $newnode->appendChild($pic);

        $newnode->setAttribute("channelHandle",$handle);

        $oldnode = $youtuber; //sets selected youtuber data as old node
        $xml->getElementsByTagName("youtubers")->item(0)->replaceChild($newnode,$oldnode); //replaces oldnode with new node
        $xml->save("BSIT3EG2G4.xml"); //saves changes
        echo "<div class='container mt-5 text-white'>
        <div class='row justify-content-center'>
            <div class='col-md-6 text-center p-4'>
               
                <h2>Updated succesfully</h2>

                <div>
                    <form action='update.php'>
                        <input class='mt-3' type='submit' value='BACK'>
                    </form>
                </div>
            </div>
        </div>
    </div>";
			break;
		}
    }
    if($flag == 0) {echo"
            
        <div class='container mt-5 text-white'>
            <div class='row justify-content-center'>
                <div class='col-md-6 text-center p-4'>
                   
                    <h2>invalid</h2>
    
                    <div>
                        <form action='update.php'>
                            <input class='mt-3' type='submit' value='BACK'>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            ";}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
