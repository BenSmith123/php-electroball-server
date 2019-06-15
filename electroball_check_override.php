<?php
// Description:
// Checks the database record (via gameID) to see if theres an override update
// Override update = update that was not made from electroball

require_once('config.php');

require_once('config_electroball_database.php'); // get the database content


if (!$connect) {
	echo "Database connection failure"; // error message
} else {
	// database connection successful!
	
	// check the current record if there is a pending update
	$query = "SELECT UPDATE_ME FROM ELECTROBALL_RECORDS WHERE ID=$ID;";
	
	$results = mysqli_query($connect,$query);
	
	if ($results == true){
	
		$get_update_me = mysqli_fetch_array($results);
		$is_update = $get_update_me[0];
		
		if ($is_update == "1"){ // if there is a pending override
			
			// send back each variable via the database for the client to set to these locally
			$query2 = "SELECT * FROM ELECTROBALL_RECORDS WHERE ID=$ID;";
			
			$results2 = mysqli_query($connect,$query2);
			
			if ($results2 == true){
				$get_data = mysqli_fetch_array($results2);
				
				echo $get_data[0];
			}
			
			
		} else {
			echo "No pending update for ID:$ID.";
		}

	} else {
		echo "set_override database query failure.";
	}
	
}

?>

