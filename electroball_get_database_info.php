<?php
// Description:
// Get number of total records in the database
// Get number of detailed records in the database

require_once('config.php');

require_once('config_electroball_database.php');

// give everything that is in the database
if (!$connect) {
	echo "Database connection failure"; // error message
} else {

	// database connection successful!
	
	$query = "SELECT * FROM ELECTROBALL_RECORDS;";
		
	$results = mysqli_query($connect,$query);
	
	if ($results == true){
		$no_of_records_all = mysqli_num_rows($results); // store the total number of records

		echo "Total accounts: $no_of_records_all\n";

		// second query to the database
		$query2 = "SELECT * FROM ELECTROBALL_RECORDS WHERE HIGHEST_LEVEL!=0;"; // store all records that aren't empty
		
		$results2 = mysqli_query($connect,$query2);
		
		$no_of_records = mysqli_num_rows($results2);
		
		if ($results2 == true){
			echo "Detailed accounts: $no_of_records\n";
			
			$query3 = "SELECT * FROM ELECTROBALL_RECORDS WHERE HIGHEST_LEVEL=120;";
			
			$results3 = mysqli_query($connect,$query3);
			
			if ($results3 == true){
				$no_of_complete = mysqli_num_rows($results3);
				
				echo "Games complete (lv120): $no_of_complete";
			}
		}
	}
	
}

?>

