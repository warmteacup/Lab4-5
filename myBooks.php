	<?php
	include ('header.php');

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


	//This sets the book to NOT borrowed (AKA return the book).
	if (isset($_GET['book_ID'])) {

	$book_ID = $_GET['book_ID'];
	$query = "UPDATE Book
	SET borrowed = 0
	WHERE book_ID = $book_ID";

	$stmt = $db -> prepare($query);
	$stmt -> execute();
}

	?>

	<div id="page-parent1">
	<h1>My books</h1>
		<p id="page-p2">
			This is where you can store your books. Ok, cool bye.
		</p>


	</div>

	<?php

	//This selects the books and the authors.
	//It then checks all books who are borrowed in the junction table (AKA borrowed = 1).
	$query = "SELECT Book.book_ID, Book.title, Authors.first_name, Authors.last_name, Book.isbn
	FROM Book
	JOIN Author_Book ON Author_Book.book_ID = Book.book_ID
	JOIN Authors ON Authors.author_ID = Author_Book.author_ID
	WHERE Book.borrowed=1";

	$stmt = $db -> prepare($query);
	$stmt -> bind_result($book_ID, $bookTitle, $first_name , $last_name, $isbn);
	$stmt -> execute();



	echo "<table>";
	echo "<tr> <td> Title of Book </td>
	<td> Author Name </td>
	<td>ISBN</td></tr>";

	while($stmt->fetch()) {
		echo "<td>$bookTitle</td>
			<td>$first_name $last_name</td>
			<td>$isbn</td>
			<td>
			<form method ='get' action =''>
			<button name ='book_ID' value='".$book_ID."'type = 'submit' > RETURN </button>
			</form> </td> </tr>
			";
}

	//echo $first_name."</br>";
	//echo $last_name."</br>";
	//echo $isbn."</br>";


	echo "</table>";

?>

	<?php include ('footer.php');
	?>
