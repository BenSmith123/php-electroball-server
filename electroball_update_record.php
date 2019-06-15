<?php
// Description:
// Retrieve information from electroball when the app is closed or opened or randomly throughout the app, store in database

require_once('config.php');

require_once('config_electroball_database.php');


if (!$connect) {
	echo "Database connection failure"; // error message
} else {
	// database connection successful!
	
	// if none of the fields are empty (didn't bother checking all) 
	if (!($ID == "" || $version == "" || $highest_level == "" || $ads_enabled == "")){ 
		
		// set the timezone, date and time
		date_default_timezone_set("Pacific/Auckland");
		$last_active = date("d-M-Y H:ia");
			
		$query = "UPDATE ELECTROBALL_RECORDS SET 
		VERSION='$version', 
		HIGHEST_LEVEL='$highest_level',
		TIME_PLAYED='$time_played',
		ADS_ENABLED='$ads_enabled',
		GAME_OPENED='$game_opened',
		GAME_RESETS='$game_resets',
		DEVICE_SYSTEM='$device_system',
		DEVICE_TYPE='$device_type',
		LAST_ACTIVE='$last_active'
		WHERE ID='$ID';";
			
		$results = mysqli_query($connect,$query);
		
		//echo $query; // debug
		
		if ($results==true){
			echo "Record successfully updated";
		} else {
			echo "Database update query failed!";
		}
	} else {
		echo "Some variables were empty, unable to update database!";
	}
	
}

?>

