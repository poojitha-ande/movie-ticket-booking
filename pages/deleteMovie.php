<?php
	$id = $_GET['movieId'];

	include "./dbConnection.php";

	$sql = "delete from Movies where Movie_Id = '".$id."'";

	if($con->query($sql)){
		echo "Deleted Successfully";
		header("Location:./movies.php?success=true");
	}
	else{
		echo "Not deleted";
		header("Location:./movies.php?success=false");
	}
	$con->close();
?>