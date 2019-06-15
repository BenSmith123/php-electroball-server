<?php

// sets the unique ID of a user for electroball app
// (connect to database, create new record, return the unique ID that was generated)
// If ID return is successful, don't return any other numbers (this will mess with the ID returned)

require_once('config.php');
require_once('config_electroball_database.php'); // get the database content


if (!$connect) {
	//echo "Database connection failure"; // error message
} else {
	
	echo "Database connection made"; // database connection successful!
	
	$query = "INSERT INTO ELECTROBALL_RECORDS (VERSION, HIGHEST_LEVEL, TIME_PLAYED, ADS_ENABLED) VALUES ('$version','$highest_level','$time_played','$ads_enabled');";
		
	$results = mysqli_query($connect,$query);

	if ($results == true){
		
		echo "Database entry created\n";
		
		$query2 = "SELECT LAST_INSERT_ID();";
		
		$results2 = mysqli_query($connect,$query2);
		
		if ($results2 == true){
			
			echo "IDsuccess"; // DO NOT REMOVE, used by electroball to confirm an ID is sent back
			
			$get_id = mysqli_fetch_array($results2);
			echo $get_id[0];
			
			//require_once('electroball_update_record.php'); // don't update here, do client side to avoid any errors that might ruin the ID

		} else {
			echo "Failed to get an ID from the database";
		}
		
	} else {
		echo "Failed to insert record into database!";
	}
	
}

?>

