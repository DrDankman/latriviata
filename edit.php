<?php
	session_start();
?>
<!doctype html>
<html lang="se">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>Soloäventyr - Redigera</title>
	<link href="https://fonts.googleapis.com/css?family=Merriweather%7CMerriweather+Sans" rel="stylesheet"> 
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav id="navbar">
	<a href="index.php">Hem</a>
	<a href="play.php?page=4">Spela</a>
	<a class="active" href="edit.php">Redigera</a>
</nav>	
<main class="content">
	<section>
		<h1>Redigera</h1>
	<form action="" method="POST">
		<fieldset>
			<legend>Ra Ra Rsuputin</legend>
			<p>
				<label for="text">Text: </label>
				<input type="text" name="text" id="text">
			</p>
			<p>
				<label for="place">Place: </label>
				<input type="text" name="place" id="place">
			</p>
			<p>
				<input type="submit" name="submit" id="submit" value="Ra Ra Rasputin">
			</p>
		</fieldset>
	</form>
<?php
// TODO protect with your login
// add, edit, delete pages & events
// skriv ut en lista över sidor
	
	include_once 'include/dbinfo.php';

	// PDO

	$dbh = new PDO('mysql:host=localhost;dbname=enroligstory;charset=utf8mb4', $dbuser, $dbpass);

	var_dump($_POST);

	echo "<p>" . $_POST['place'] . "</p>";

	$stmt = $dbh->prepare("SELECT * FROM story");
	$stmt->execute();
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach ($row as $value) {
		echo "<tr>";
		echo "<td>" . $value['id'] . "</td>";
		echo "<td>" . substr($value['text'], 0, 40) . "...</td>"; // substr pajjar teckenkodning?
		echo "<td>" . $value['place'] . "</td>";
		echo "<td><a href=\"edit.php?edit=" . $value['id'] . "\"><i class=\"material-icons m-center\">edit</i></a>";
		echo "<a href=\"edit.php?delete=" . $value['id'] . "\"><i class=\"material-icons m-center\">delete_forever</i></a></td>";
		echo "</tr><br>";
	}

?>
</section>
</main>
<script src="js/navbar.js"></script>
</body>
</html>