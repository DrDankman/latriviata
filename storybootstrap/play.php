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
			<!--navbar-->
			<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="index.php">Hem</a>
				<a class="navbar-brand" href="play.php?page=4">Spela</a>
				<a class="navbar-brand" href="edit.php">Redigera</a>
				<a class="navbar-brand" href="index.php"><img class="ikon" src="latrivia.png" alt="latrivia.png"></a>
			</nav>
		</div>
		
<?php
	include_once 'include/dbinfo.php';

	// PDO

	$dbh = new PDO('mysql:host=localhost;dbname=enroligstory;charset=utf8mb4', $dbuser, $dbpass);

	if (isset($_GET['page'])) {
		// TODO load requested page from DB using GET
		// prio before session
		// set session to remember
		$filteredPage = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);

		$stmt = $dbh->prepare("SELECT * FROM story WHERE id = :id");
		$stmt->bindParam(':id', $filteredPage);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

	echo "<div class='container'>
		  <div class='row'>
		    <div class='col bredcolumn' id='maincol'>" . $row['text'] . "</div>
		  </div>";


		$stmt = $dbh->prepare("SELECT * FROM storylinks WHERE storyid = :id");
		$stmt->bindParam(':id', $filteredPage);
		$stmt->execute();

		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo "<div class='row'>";
		foreach ($row as $val) {
			echo "
		    		<div class='col-5 bredcolumn'>
		      			<a class='alternativ' href=\"?page=" . $val['target'] . "\">" . $val['text'] . "</a>
		    		</div>
		  		";
		}
		echo "</div>";


	} elseif(isset($_SESSION['page'])) {
		// TODO load page from db
		// use for returning player / cookie
	} else {
		// TODO load start of story from DB
	}

?>

	</main>
	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>