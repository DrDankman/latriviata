<?php
	session_start();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
		<title>Soloäventyr</title>
	<link href="https://fonts.googleapis.com/css?family=Merriweather%7CMerriweather+Sans" rel="stylesheet"> 
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="style.css">	
</head>
<body>
	<main class="content">
		<div class="container-fluid">
			<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="index.php">Hem</a>
				<a class="navbar-brand" href="play.php?page=4">Spela</a>
				<a class="navbar-brand" href="edit.php">Redigera</a>
				<a class="navbar-brand" href="index.php"><img class="ikon" src="latrivia.png" alt="latrivia.png"></a>
			</nav>
		</div>

		<div class="container">
		  <div class="row">
		    <div class="col bredcolumn" id="maincol">
		      VÄLKOMMEN TILL ALFREDOS VAL 
		      <br><br><br><a class="alternativ" href="play.php?page=4">Spela</a>
		    </div>
		  </div>
		</div>
	</main>
	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>