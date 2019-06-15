<?php
// Description:
// TRUNCATE database (delete all records) - is faster and resets the ID increment to 0
// Then set the start ID to 1000


require_once('config.php');

require_once('config_electroball_database.php');

if (!$connect) {
	echo "Database connection failure"; // error message
} else {
	
	// database connection successful!
	
	$query = "TRUNCATE ELECTROBALL_RECORDS;"; // delete add database records
	$results = mysqli_query($connect,$query);
	
	if ($results==true){ // deletion successful
		$query2 = "ALTER TABLE ELECTROBALL_RECORDS AUTO_INCREMENT=1000;";
		$results2 = mysqli_query($connect,$query2);
		
		if ($results2==true){
			echo "Database successfully reset!";
			
		} else {
			echo "Unable to set the start ID of database to 1000.";
		}
	} else {
		echo "Unable to delete all records from database.";
	}

}

?>

