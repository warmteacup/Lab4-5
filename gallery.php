<?php
include ('header.php');
ini_set('display_errors', 1);
ini_set('html_errors', 1);
error_reporting(E_ALL);

//Open the data base

$server = "localhost";
$username = "root";
$password = "root";
$dbname = "Book club";

@ $db = new mysqli($server, $username, $password, $dbname);




//check connection
if($db ->connect_error) {
echo "Damn it, we couldn't connect... This is why:". $db->connect_error;
exit();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
<body>
		<h1 id="h1G"> Photo gallery </h1>

		<div id="imgContainer">
		<?php
		$query = "SELECT Gallery.imgLocation
		FROM Gallery";
		$stmt = $db -> prepare($query);
		$stmt -> bind_result($imgPlace);
		$stmt -> execute();

		while($stmt->fetch()) {
		echo "
		<div id='galleryWrapper'>
		<img class='galleryImg' src=$imgPlace>
		</div>
		";
		}
		?>
	</div>



	</body>
</html>
