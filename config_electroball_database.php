<?php
// Description:
// Retrieve information, store in database
// This does not return a server message - only update

$ID = $_POST['ID']; // inside post is the name of the variable being sent (client side)
$version = $_POST['version'];
$highest_level = $_POST['highest_level'];
$time_played = $_POST['time_played'];
$ads_enabled = $_POST['ads_enabled'];
$game_opened = $_POST['game_opened'];
$game_resets = $_POST['game_resets'];
$device_system = $_POST['device_system'];
$device_type = $_POST['device_type'];

//$update_me = $_POST['update_me']; // used to let the client-side know that the server wants to override it

//$connect = mysqli_connect($host,$user,$password,$database) or die('<p>Failed to connect to server</p>');
//$connect = mysqli_connect($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
//$connect = mysqli_connect("electrodb.cma1vhokonka.us-east-1.rds.amazonaws.com", "REMOVED", "REMOVED");

//$connect = mysqli_connect("electrodb.cma1vhokonka.us-east-1.rds.amazonaws.com", "REMOVED", "REMOVED", "electroballdb"); // old database name!

$connect = mysqli_connect("my-universal-database.cma1vhokonka.us-east-1.rds.amazonaws.com", "REMOVED", "REMOVED", "my-universal-database");

?>

