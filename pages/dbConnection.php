<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "Movie_Ticket_Booking";

	$con = new mysqli($server, $username, $password, $database);

	if($con->connect_error){
		echo "mysql is not connected";
	}
?>