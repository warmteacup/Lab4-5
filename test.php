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

<pre>
 <?php
 if (isset($_FILES['upload']) ) {

   $maxsize = 2000000; //This is 2mb :)
   $allowed = array('jpg', 'png', 'jpeg', 'gif');
   //Extension = makes capital letters into lowercase.
   //This will also just change the the letters of the file, so HEY.JPG will become: HEY.jpg.
   $ext = substr($_FILES['upload']['name'], strpos($_FILES['upload']['name'], '.')+1);
   //Take file name and file and upload to the server.
   //You can save the file name in the DB, but you always save the file on the SERVER.

   $errors = array();
   //Place errors, if upload is faulty.
   //We use an array since you can have multiple errors.

   if(in_array($ext, $allowed) === false) {
      array_push($errors,'THIS IS EXTENSION IS NOT ALLOWED');
  }
    if($_FILES['upload']['size']>$maxsize) {
    array_push($errors,'THIS FILE IS TOO BIG.');
  }

    if(empty($errors)) {
      echo "<p class='text-success'><i class='fa fa-success' aria-hidden='true'></i> Uploaded :) </p> <br> ";
      $loc = 'uploads/'.$_FILES['upload']['name'];
      $query = "INSERT INTO Gallery (imgLocation) VALUES (?)";

      $stmt -> bind_param('s',$loc);
        $stmt = $db -> prepare($query);
        $stmt -> execute();
      //If there is no errors, we will upload.
      move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/{$_FILES['upload']['name']}");

    }else{
      echo "No bueno";
        foreach ($errors as $err) {
          echo "<p class = 'text-danger'><i class='fa fa-exclamation' aria-hidden='true'></i> ". $err ."</p> <br> ";

        }
      }



}
  ?>
</pre>
 <form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="upload" id="upload ">
    <input type="submit" value="Upload Image" name="uploadBtn">
</form>

<?php
include ('footer.php');
?>
