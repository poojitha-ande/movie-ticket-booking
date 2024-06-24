<?php

	session_start();
	
	if($_POST){
		$movieName = $_POST['mname'];
		$price = $_POST['price'];

		//retreiving the file details
		$filename = $_FILES['posterFile']['name'];

		move_uploaded_file($_FILES['posterFile']['tmp_name'], "../img/movies/".$_FILES['posterFile']['name']);
		$path = "../img/movies/".$_FILES['posterFile']['name'];

		include './dbConnection.php';

		$sql = "INSERT INTO Movies(Movie_Name, Price, path) values('".$movieName."','".$price."','".$path."')";

		if($con->query($sql)){
			echo "<div class='ui mini modal'>
					<i class='green circle close icon'></i>
					<div class='content'>
						<h3 style='color:green'>Movie added successfully</h3>
					</div>
				  </div>";
		}
		else{
			echo "<div class='ui mini modal'>
					<i class='red circle close icon'></i>
					<div class='content'>
						<h3 class='color:red'>Movie not added</h3>
					</div>
				  </div>";
		}

		$con->close();
	}
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="../js/semantic.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/semantic.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/components/icon.min.css">
		<link rel="stylesheet" type="text/css" href="../css/menu.css">
	</head>
<body>

		<?php
			include "./menu.php";
		?>

		<div class="ui container">
			<div class="ui blue raised centered header segment">
				ADD  MOVIES
			</div>

		<div class="ui stackable grid">
			<div class="four wide column"></div>
			<div class="eight wide column">
				<form class="ui form" method="post" enctype="multipart/form-data">
					<div class="ui teal raised segment">
						<div class="ui field">
							<label><b>Movie Name:</b></label>
							<input type="text" name="mname" placeholder="Enter the Movie name" minlength="1" required>
						</div>
						<div class="ui field">
							<label><b>Price:</b></label>
							<input type="text" name="price" placeholder="Enter the Price" minlength="3" required>
						</div>

						<div class="ui field">
							<label><b>Movie  Poster:</b></label>
							<input type="file" name="posterFile">
						</div>

						<div class="ui field">
							<input class="ui primary button" type="submit" value="Submit">
						</div>
					</div>
				</form>
			</div>
			<div></div>
		</div>
		</div>
	</body>
	<script>
		$('.mini.modal').modal('show');
	</script>
</html>

