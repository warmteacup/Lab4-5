<?php include("config.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Book club</title>
	<link href="bookStyle.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700" rel="stylesheet">
</head>
<body>
<div id="header-skin">
	<div class="headerLogo">
		<ul>
			<a href="index.php"><li id="logo"> Warm teacup </li></a>
			<!--<a><li id="logo"> <img id="logoPic" src="bookandcup.png"> </li></a>-->
		</ul>
	</div>

	<div id="header-parent">
		<ul>

			<li class="header_item">
				<a class="<?php echo ($current_page == 'contact.php') ? 'active' : NULL ?>"
					href="contact.php">Contact</a></li>

			<li class="header_item">
				<a class="<?php echo ($current_page == 'login.php') ? 'active' : NULL ?>"
					href="login.php">Login</a></li>

			<li class="header_item">
				<a class="<?php echo ($current_page == 'myBooks.php') ? 'active' : NULL ?>"
					href="myBooks.php">My Books</a></li>

			<li class="header_item">
				<a class="<?php echo ($current_page == 'about.php') ? 'active' : NULL ?>"
					href="about.php">About</a></li>

			<li class="header_item">
				<a class="<?php echo ($current_page == 'browseBooks.php') ? 'active' : NULL ?>"
					href="browseBooks.php">Browse</a></li>

			<li class="header_item">
				<a class="<?php echo ($current_page == 'index.php'|| $current_page == '') ? 'active' : NULL ?>"
					href="index.php">Index</a></li>

			<li class="header_item">
				<a class="<?php echo ($current_page == 'gallery.php') ? 'active' : NULL ?>"
					href="gallery.php">Gallery</a></li>
		</ul>

	</div>
</div>
