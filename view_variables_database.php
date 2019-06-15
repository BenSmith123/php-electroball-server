<?php
// Description:
// Retrieve information, store in database
// Return a server message

require_once('config.php');

$connect = mysqli_connect("my-universal-database.cma1vhokonka.us-east-1.rds.amazonaws.com", "REMOVED", "REMOVED", "my-universal-database");

// give everything that is in the database
if (!$connect) {
	echo "Database connection failure"; // error message
} else {
	
	// database connection successful!
	$query = "SELECT * FROM VARIABLES;";
		
	$results = mysqli_query($connect,$query);
	
	$n = 0;
	
	echo "---------------- #";
	
	while($row = mysqli_fetch_array($results)){
		echo $row['NAME'] . " = " . $row['VALUE'] . "#";
		$n++;
		
		echo "#";
	}
	
	echo "---------------- #"; 
	echo "Database entries: " . $n;

}

?>

