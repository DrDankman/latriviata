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
	</style>	
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

		<form method="POST" accept-charset="utf-8">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Text:</label>
		    <input type="text" class="form-control" id="exampleInputText1" placeholder="">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Plats:</label>
		    <input type="text" class="form-control" id="exampleInputText1" placeholder="">
		  </div>
		  <button type="submit" class="btn btn-primary">Skicka</button>
		</form>

<?php
// TODO protect with your login
// add, edit, delete pages & events
// skriv ut en lista över sidor
	
	include_once 'include/dbinfo.php';

	// PDO

	$dbh = new PDO('mysql:host=localhost;dbname=enroligstory;charset=utf8mb4', $dbuser, $dbpass);

	$stmt = $dbh->prepare("SELECT * FROM story");
	$stmt->execute();
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);


//printar ut allt från story i databasen: id, texten, platsen samt visar knapp för att redigera/radera
	foreach ($row as $value) {
		echo "<div class='row'>
			  	<div class='col-8 editdiv'>" . $value['id'] . ' ' . substr($value['text'], 0, 300) . "</div>
			  	<div class='col-2 editdiv'>" . $value['place'] . "</div>
			  	<div class='col-2 editdiv'>
			  		<a class='alternativ' href=\"edit.php?edit=" . $value['id'] . "\"><i class=\"material-icons m-center\">Edit</i></a>
			  		<a class='alternativ' href=\"edit.php?delete=" . $value['id'] . "\"><i class=\"material-icons m-center\">Delete</i></a>
			  	</div>
			</div>";

	}

?>

	</main>
	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>