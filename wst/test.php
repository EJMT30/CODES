<!doctype html>
<html>
	<head>
	<title>Update Page</title>
		<script>
			function showdata(){
				var check = "@IvanaAlawi";
				http = new XMLHttpRequest();
				http.onreadystatechange = function(){			
					if(http.readyState == 4 && http.status == 200)
					{
						xmlDocument = http.responseXML;
						youtubers = xmlDocument.getElementsByTagName("youtuber");
						for(youtuber of youtubers){
							chandle = youtuber.getAttribute("channelHandle");
							if(check==chandle){
								alert("found");
							}
							else{
								alert("not found");
							}

						}
					}
				};	
				http.open("GET", "BSIT3EG2G4.xml",true);
				http.send();
			}
		</script>
	</head>
	<body>
		<button onclick="showdata()">tite</button>
		<label id="handle">sdsdsdsd</label>
	</body>		
</html>