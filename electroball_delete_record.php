<?php

// deletes a record from the database via the game ID
// (connect to database, create new record, return the unique ID that was generated)

require_once('config.php');

require_once('config_electroball_database.php'); // get the database content


if (!$connect) {
	echo "Database connection failure"; // error message
} else {
	
	// database connection successful!
	
	$query = "DELETE FROM ELECTROBALL_RECORDS WHERE ID=$ID;";
		
	$results = mysqli_query($connect,$query);

	if ($results == true){
		echo "Database record ($ID) deleted.";
	} else {
		echo "Failed to delete record ($ID) from database.";
	}
	
}

?>

