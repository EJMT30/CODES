<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sample page</title>
	<style>
		body{
			background-color: grey;
		}
		#left{
			float: left;
			background-color: grey;
			max-height: inhert;
			max-width: inherit;
			height: 100vh;
		}
		#display{
			background-color: grey;
			height: 100vh;
			padding: 10px;
			text-align: center;
		}
		#search{
			border: 1px solid black;
			border-radius: 10px;
			display: inline-block;
			text-align: left;
			padding: 0 10px ;
			width: 50%;
		}
	</style>
</head>
<body>
<div id="main">
	<div id="left">
		this is left side<br>
		sdfsd<br>
		sdfsdf

	</div>
	<div id="display">
		<div id="search">
			search...
		</div>
		<div id="content">
			show content
		</div>
	</div>
</div>
</body>
</html>