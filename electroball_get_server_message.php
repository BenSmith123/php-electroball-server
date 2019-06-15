<?php
// Description:
// Return a server message based on version and operating system
// Don't use debugging or error messages in this file!

require_once('config.php');

// get the version and operating system
$version = $_POST['version'];
$device_system = $_POST['device_system'];

/***************
Client side operating systems that can be recieved:
"Windows"
"Android"
"MacOS"
"iOS"
"???"
***************/

echo "MSG:"; // DO NOT REMOVE OR CHANGE - lets the app know that any coming message is not an error.
// ^^ the 'MSG:' is also processed client-side

if ($device_system == "iOS") {
	
	switch ($version) {
		
		// first published version
		case "1.0.4":
			echo "Welcome to ElectroBall! Only 1.6% have currently completed all 120 levels!";
			break;
		
		// final testing version
		case "1.0.3":
			echo "This is the final test version of the app! Please test as much as possible and report any bugs :)";
			break;
		
		case "1.0.2":
			echo "PLEASE UPDATE! A final copy of the app is now available: Added sound, 120 levels, bugs fixed.";
			break;
					
		default:
			echo "There is an update available!"; // by default just assume there is an update available
	}
}

if ($device_system == "Android") {
	
	switch ($version) {
		
		// first published version
		case "1.0.4":
			echo "Welcome to ElectroBall! Only 1.6% have currently completed all 120 levels!";
			break;
		
		case "1.0.1":
			echo "Server says: Hello Android device.";
			break;
			
		default:
			echo "There is an update available!"; // by default just assume there is an update available
	}
}

if ($device_system == "Windows") {
	echo "Server says: Hello Windows device.";
}

if ($device_system == "MacOS") {
	echo "Hello MacOS user";
}


?>

