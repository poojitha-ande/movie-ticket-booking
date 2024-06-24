<?php
	session_start();

	if(!empty($_GET['success'])) {
		if($_GET['success'] == "true") {
			echo '
				<div class="ui mini modal">
					<i class="green circle close icon"></i>
					<div class="content">
						<h3 style="color: green;">Movie deleted Successfully...!!!</h3>
					</div>
				</div>
			';
		} else {
			echo '
				<div class="ui mini modal">
					<i class="red circle close icon"></i>
					<div class="content">
						<h3 style="color: red;">Failed to delete Movie...!!!</h3>
					</div>
				</div>
			';
		}
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
				M O V I E S
			</div>

			<div class="ui stackable grid">
<?php

	include "./dbConnection.php";

	$sql = "select * from Movies";
	$result = $con->query($sql);

	if($result->num_rows > 0){

		while($row = $result->fetch_assoc()){
			echo "<div class='four wide column'>
						<div class='ui raised segment'>
							<div class='ui card'>
								<a class='image' href='#'>
									<img src=".$row['path']."
								</a>
								<div class='content'>
									<center>
										<h3 class='header' href='#'>".$row['Movie_Name']."</h3>
									</center>";

								if(empty($_SESSION['id'])){

								}
								else{
									if($_SESSION['typeOfUser']=="admin"){
										if(empty($_GET['theaterId'])){
											echo "
											<center>
												<a href='./bookNow.php?movieName=".$row["Movie_Name"]."&movieId=".$row["Movie_Id"]."&price=".$row["Price"]."'>
													<button class='ui blue button'>Book Now</button>
												</a>
												<a href='./deleteMovie.php?movieId=".$row["Movie_Id"]."'>
													<button class='ui red button'>
													Delete</button>
												</a>
											</center>";
										} else {
											echo "
											<center>
												<a href='./bookNow.php?movieName=".$row["Movie_Name"]."&movieId=".$row["Movie_Id"]."&price=".$row["Price"]."&theaterId=".$_GET['theaterId']."'>
													<button class='ui blue button'>Book Now</button>
												</a>
												<a href='./deleteMovie.php?movieId=".$row["Movie_Id"]."'>
													<button class='ui red button'>
													Delete</button>
												</a>
											</center>";
										}
										
									}
									else{
										if(empty($_GET['theaterId'])){
											echo "
										<center>
											<a href='./bookNow.php?movieName=".$row["Movie_Name"]."&movieId=".$row["Movie_Id"]."&price=".$row["Price"]."'>
												<button class='ui blue button'>Book Now</button>
											</a>
										</center>";
										} else {
											echo "
										<center>
											<a href='./bookNow.php?movieName=".$row["Movie_Name"]."&movieId=".$row["Movie_Id"]."&price=".$row["Price"]."&theaterId=".$_GET['theaterId']."'>
												<button class='ui blue button'>Book Now</button>
											</a>
										</center>";
										}
										
									}
								}						
							echo "
							</div>
						</div>
					</div>
				</div>";
		}
	} else {
			echo "<div class='three wide column'></div>
				<div class='ten wide column'>
					<div class='ui red raised centered header segment'>
						No Movies Found...!!!
					</div>
				</div>";
	}

	$con->close();
?>
				
			</div>

		</div>
<script type="text/javascript">
	$('.mini.modal').modal('show');
</script>
	</body>
</html>