<?php
// Description:
// Get a single record from the database

require_once('config.php');

require_once('config_electroball_database.php');

// give everything that is in the database
if (!$connect) {
	echo "Database connection failure"; // error message
} else {
	
	// database connection successful!
	$query = "SELECT * FROM ELECTROBALL_RECORDS WHERE ID=$ID;";
		
	$results = mysqli_query($connect,$query);
	
	while($row = mysqli_fetch_array($results)){
		echo "ID: " . $row['ID'] . "#";
		echo "Version: " . $row['VERSION'] . "#";
		echo "Highest Level: " . $row['HIGHEST_LEVEL'] . "#";
		echo "Time Played: " . $row['TIME_PLAYED'] . "#";
		echo "Ads Enabled: " . $row['ADS_ENABLED'] . "#";
		echo "Opened: " . $row['GAME_OPENED'] . "#";
		echo "Resets: " . $row['GAME_RESETS'] . "#";
		echo "System: " . $row['DEVICE_SYSTEM'] . "#";
		echo "Type: " . $row['DEVICE_TYPE'] . "#";
		echo "Last active: " . $row['LAST_ACTIVE'] . "#";
	}
	
}

?>

