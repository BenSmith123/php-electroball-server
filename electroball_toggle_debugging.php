<?php
// Description:
// When this file is called, connect to database and get the current state of the debugger
// If read_only is false then this will toggle the current state of the debugger
// However an access code is required  (which is built-in to AppSwitch)
// If the access_code is valid, turn on/off the debugging server
// The debugging server is just a variable in the variables table

require_once('config.php');

$access_code = $_POST['access_code']; // inside post is the name of the variable being sent (client side)
$read_only = $_POST['read_only']; // if the client sends this as true (1) then don't toggle the debugger

if ($access_code != "" || $read_only != "") // if neither variables are set, don't proceed any further
{
	$connect = mysqli_connect("my-universal-database.cma1vhokonka.us-east-1.rds.amazonaws.com", "REMOVED", "REMOVED", "my-universal-database");

	if ($connect){
		
		$query1 = "SELECT VALUE FROM VARIABLES WHERE NAME='electroball_debug_enabled';";
		$results1 = mysqli_query($connect,$query1);
		
		// get the current state of the debug server then toggle the results (if enabled, disable and vice-versa)
		if ($results1==true){
			
			while($row = mysqli_fetch_array($results1)){ // get the current status of debug server
				$debug_enabled = $row['VALUE'];
			}
			
			if ($read_only != "1"){ // if read-only is true, end the script here!
			
				if ($access_code == "REMOVED"){ // if the access_code is successful
					
					// if read-only was not set or is false, toggle the debug access
					if ($debug_enabled == "1"){ // if the debug server is ON/OFF, set a toggle for it to be changed
						$toggle = "0";
					} else if ($debug_enabled == "0"){
						$toggle = "1";
					}
					
					// make another query to toggle the 
					$query2 = "UPDATE VARIABLES SET VALUE=$toggle WHERE NAME='electroball_debug_enabled'";
					$results2 = mysqli_query($connect,$query2);
					
					// based on what the status of the debugger already was, return 
					if ($results2==true){
						if ($toggle == "1"){ // if the toggle was on, it should now be off
							echo "ElectroBall debugging server is now ONLINE.";
						} else {
							echo "ElectroBall debugging server is now OFFLINE.";
						}
						
					} else {
						echo "Failed to toggle the debugging server access.";
					}
			
				} else {
					echo "Invalid access code.";
				}
				
			} else {
				if ($debug_enabled == "1"){ // if read_only == 1 (true) then just return the current value of the electroball debugger
					echo "ElectroBall debugging server is ONLINE."; 
				} else if ($debug_enabled == "0"){
					echo "ElectroBall debugging server is OFFLINE.";
				}
			}
			
		} else {
			echo "Query failure";
		}
				
	} else {
		echo "Database connection failure.";
	}
	
}
/* else {
	echo "No variables were set";
}


?>

