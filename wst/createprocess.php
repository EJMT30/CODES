<?php
//open class
    $xml = new domdocument("1.0");
    $xml->formatOutput = true;
    $xml->preserveWhiteSpace = false;//formatting ng pano isasave ung created data
    $xml->load("BSIT3EG2G4.xml");// open xml

    //get all inputs
    $channelHandle = $_POST["channelHandle"];
    $channelLink = $_POST["channelLink"];
    $channelName = $_POST["channelName"];
    $subCount = $_POST["subCount"];
    $mostViews = $_POST["mostViews"];
    $genre = $_POST["genre"];
    $date =$_POST['date'];
    $picture = $_POST['ytpic'];

    //gawa bagong tags tapos lalagyan ng data sa loob
    $youtuber = $xml->createElement("youtuber");//parent tag
    $channelLink = $xml->createElement("youtubeLink",$channelLink);
    $channelName = $xml->createElement("channelName",$channelName);
    $subCount = $xml->createElement("subCount",$subCount);
    $mostViews = $xml->createElement("mostViews",$mostViews);
    $genre = $xml->createElement("contentType",$genre);
    $date = $xml->createElement("creationDate",$date);

    //picture
    $pic = $xml->createElement("picture"); 
    $imageData = file_get_contents($picture);
    $base64 = base64_encode($imageData);
    $cdata = $xml->createCDATASection($base64);
    $pic->appendChild($cdata);

    //kabit lahat ng child elements sa parent tag
    $youtuber->appendChild($channelLink);
    $youtuber->appendChild($channelName);
    $youtuber->appendChild($subCount);
    $youtuber->appendChild($mostViews);
    $youtuber->appendChild($genre);
    $youtuber->appendChild($date);
    $youtuber->appendChild($pic);
    $youtuber->setAttribute("channelHandle",$channelHandle);

    //kabit ung ginawang data sa xml file nasa pinaka dulo mag kakabit
    $xml->getElementsByTagName("youtubers")->item(0)->appendchild($youtuber);
    $xml->save("BSIT3EG2G4.xml"); //save data
    echo "Record saved...<a href='create.php'>Back</a>";

?>