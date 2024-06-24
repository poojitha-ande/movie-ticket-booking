<?php
	session_start();

	if($_POST){
		$userId = $_SESSION['id'];
		$movie_id = $_POST['movieId'];
		$movieName = $_POST['movieName'];
		$theaterName = $_POST['theaterName'];
		$ticketPrice = $_POST['price'];
		$persons = $_POST['count'];
		$totalcost = $_POST['totalcost'];	
		$slot = $_POST['slot'];
		$date = $_POST['date'];
		
		$ticketNumber = '';
		function randomDigits($length){
		    $numbers = range(0,9);
		    shuffle($numbers);
		    for($i = 0; $i < $length; $i++){
		    	global $ticketNumber;
		       	$ticketNumber .= $numbers[$i];
		    }
		    return $ticketNumber;
		}	
		randomDigits(10);

		include "./dbConnection.php";

		$sql = "insert into Tickets (Ticket_Id, User_Id, Movie_Id, Movie_Name,  Theater_Name, Date, Slot, Cost, No_Of_Persons, Total_Cost) values('".$ticketNumber."','".$userId."','".$movie_id."','".$movieName."','".$theaterName."','".$date."','".$slot."','".$ticketPrice."','".$persons."','".$totalcost."')";

		if($con->query($sql)){
			header('Location: ./ordersRetrieve.php?success=true&ticketNumber='.$ticketNumber.'');
		}
		else{
			header('Location: ./ordersRetrieve.php?success=false');
		}
	}
?>