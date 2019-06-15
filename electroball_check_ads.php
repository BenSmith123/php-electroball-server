<?php
// Description:
// If ads are enabled on client-side, call this to check with server-side if ads have been disabled via server
// This does not return a server message - only update

require_once('config.php');

require_once('config_electroball_database.php');

/******DATABASE******
ID
version
highest_level
time_played
ads_enabled
*********************/

if (!$connect) {
	//echo "Database connection failure"; // error message
} else {
	// database connection successful!
	
	$query = "SELECT ADS_ENABLED FROM ELECTROBALL_RECORDS WHERE ID=$ID;"; 
	$results = mysqli_query($connect,$query);

	if ($results==true){
	
		while($info = mysqli_fetch_array($results)){

			$ads = $info['ads_enabled'];
			
			if ($ads == 1){
				echo "ADS ARE ENABLED";
			}
		}
	}
	
	
}

?>

