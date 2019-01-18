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

$searchAuthor = "";
$searchTitle = "";

//This code helps us update the status of the book, AKA you can borrow it.
if (isset($_GET['book_ID'])) {

	$book_ID = $_GET['book_ID'];
	$query = "UPDATE Book
	SET borrowed = 1
	WHERE book_ID = $book_ID";
	//echo $query;

	$stmt = $db -> prepare($query);
	$stmt -> execute();
}

//check if the user has entered anything
//In pure english: If the POST isSet and if the post is NOT(!) empty execute lalala.

if(isset($_POST) && !empty($_POST)) {

	#trim takes away spaces before and after the text in the search bar.
	#The POST puts the author/title into the variable to match the search.
	$searchAuthor = trim($_POST['author']);
	$searchTitle = trim($_POST['bookTitle']);
}

//This selects the books and the authors.
//It then checks if the IDs match in the junction table.
$query = "SELECT Book.book_ID, Book.title, Authors.first_name, Authors.last_name, Book.isbn
FROM Book
JOIN Author_Book ON Author_Book.book_ID = Book.book_ID
JOIN Authors ON Authors.author_ID = Author_Book.author_ID";


if ($searchTitle && ! $searchAuthor) {
	$query = $query . " WHERE Book.title LIKE '%" . $searchTitle . "%' ";
}

if (!$searchTitle && $searchAuthor) {
	$query = $query . " WHERE Authors.first_name LIKE '%" . $searchAuthor . "%' ";
}

if ($searchTitle && $searchAuthor) {
	$query = $query . " WHERE Book.title '%" . $searchTitle . "%' AND Authors.first_name LIKE '%" . $searchAuthor . "%' ";
}



//I think this is suppose to echo out stuff when things aren't working? Not Sure.

//This Prepares my query, gets all matching results from the database and then shows it to me :)
$stmt = $db -> prepare($query);
$stmt -> bind_result($book_ID, $bookTitle, $first_name , $last_name, $isbn);
$stmt -> execute();


?>
	<div id="page-parent1">
	<h1>Find some new books!</h1>
			<center>
				<form action="" name="search" method="POST" class="form-inline">
					<input id="bookTitle" name="bookTitle" type="text" placeholder="Search book title">
					<input id="author" name="author" type="text" placeholder="Search author">
					<button id="browse-button" name="submit_search"  type="submit"></button>
				</form>
			</center>
	</div>

	<!---Creates a new table which will give you the books and authors -->

<?php

//echo $query;

//The code down below will create a button which will refresh the page.
//If done correctly, this combined with some code higher up will make you search and reserve a book.

	echo "<table>";
	echo "<tr> <td> Title of Book </td>
	<td>Author Name </td>
	<td>ISBN</td></tr>";


	while($stmt->fetch()) {
		echo "<td>$bookTitle</td>
			<td>$first_name $last_name</td>
			<td>$isbn</td>
			<td>
			<form method ='get' action =''>
			<button name ='book_ID' value='".$book_ID."'type = 'submit' > RESERVE </button>
			</form> </td> </tr>
			";

}

	echo "</table>";



?>




<?php include ('footer.php');
?>
