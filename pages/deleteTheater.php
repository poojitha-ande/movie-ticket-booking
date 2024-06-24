<?php

	$id = $_GET['theaterId'];
	$path = $_GET['path'];

	include './dbConnection.php';

	$sql = "delete from Theater where Theater_Id = '".$id."'";

	if($con->query($sql)==True){
		echo"Deleted Successfully";
		unlink($path);
		header("Location:./theaters.php?success=true");
	}
	else{
		echo "Not deleted";
		header("Location:./theaters.php?success=false");
	}

	$con->close();
?>
