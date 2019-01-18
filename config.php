<?php
ini_set('post_max_size', '100M');

$url = $_SERVER['REQUEST_URI'];
$url_array = explode("/", $url); // ["", "BookClub", "config.php"]
$current_page = end($url_array);

//Define configuration.
//define("DB_HOST", "localhost");
//define("DB_PORT", 8889);
//define("DB_USER", "root");
//define("DB_PASS", "root");
//define("DB_NAME", "Book Club");



/*
session hijacking
•Someone uses JavaScript code to steal the Session ID and pretends to be you :(


•When you start a session you create a cookie and its content is a "String code".
•If a hacker gets this cookie, they can send it as a session ID and accsess your session.

•To protect yourself you make sure that you send that cookie via PHP, which prevents JS to steal it.
•

if ($_SESSION['userip'] !== $_SERVER['REMOTE_ADDR']){
#if it is not the same, we just remove all session variables
session_unset();
session_destroy();
    } 
*/
?>
