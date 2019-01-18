<?php
include ('header.php');

//Connect to your glorious DB
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "Book club";

@ $db = new mysqli($server, $username, $password, $dbname);

//check connection :)
if($db ->connect_error) {
	echo "Damn it, we couldn't connect... This is why:". $db->connect_error;
	exit();
}
//This checks if the boxes are empty.
//If they are NOT empty, they will post.
if (isset($_POST) && !empty($_POST)) {
    $myUsername = mysqli_real_escape_string ($db, $_POST['username']);
    $myPassword = mysqli_real_escape_string ($db, $_POST['password']);
		//Username and passwords is what they are called in the DB.

    //This line BANNS all code in the form :)
    //mysqli_real_escape_string($db, $myUsername/$myPassword);

    $stmt = $db ->prepare(
    "SELECT username, password
    FROM User
    WHERE username = ?");
    //This line replaces the question mark with the username
    $stmt->bind_param('s', $myUsername); //This is a string and the value is the content of $myUsername.
  	$stmt->bind_result($dbusername, $dbpassword);
	  $stmt->execute();

    //Save.


    //Check the password with a while statement.
    while ($stmt->fetch()) {
      if (md5($myPassword) == $dbpassword) {

        //echo "Welcome <3";
        header('location:fileupload.php');
      }
      echo "Get lost! That's not the right password :c";
    }

  }
?>
<div id="login-parent">
<h1>Jump back in!</h1>
    <center>
      <form action="" name="login-form" method="POST" class="form-inline">
        <input id="username" name="username" type="text" placeholder="My username">
        <input id="password" name="password" type="text" placeholder="My password">
        <button id="login-button" name="login_button"  type="submit"></button>
      </form>
    </center>
</div>

<?php
include('footer.php');
?>
