<?php 
	include ('header.php'); 
	ini_set(display_errors, 1);
	error_reporting(E_ALL);
?>

<h1>Search page</h1>

<div class="book-container">

<?php 
	if(isset($_POST['submit_search'])) {
		$search = mysqli_real_escape_string($db, $_POST['search'] );
		$sql = "SELECT * FROM Book , Authors WHERE title LIKE '%$search%' OR author LIKE '%$search%'  ";

		$result = mysqli_query($db, $sql);
		$queryResult = mysqli_num_rows($result);
		echo "There are".$queryResult " results!";

		if ($queryResult > 0 ) {
			while ($row = mysqli_fetch_assoc($result) )
				echo "<a href''> <div> 
						<h3>".$row ['title']. "</h3>
						<p>".$row ['first_name', 'last_name']. "</p>
						<p>".$row ['borrowed']. "</p>
					</div> </a>;"

		} else {
			echo "There are no results matching your search";
		} 
	}
?>

	</div>div>