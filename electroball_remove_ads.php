<?php
// Description:
// If ads are enabled on client-side, call this to check with server-side if ads have been disabled via server
// This does not return a server message - only update

require_once('config.php');

require_once('config_electroball_database.php');


if (!$connect) {
	//echo "Database connection failure"; // error message
} else {
	// database connection successful!
	
	$query = "UPDATE ELECTROBALL_RECORDS SET ADS_ENABLED=0 WHERE ID=$ID;"; 
	$results = mysqli_query($connect,$query);

	if ($results==true){
		echo "Remove Ads query successful!\nID:$ID";
	} else {
		"Failed to remove ads for ID $ID";
	}
	
}

?>

