<?php
	session_start();
	include "./dbConnection.php";
?>
<!DOCTYPE>
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
	<title></title>
</head>
<body>

	<?php
		include "./menu.php";
	?>
	<div class="ui container">
		<div class="ui blue raised centered header segment">
			<?php
				if(!empty($_GET['success'])) {
					if($_GET['success'] == "true") {
						echo "<h2 style='color:green;'>Hurrayy....!!!<br>Ticket Booked Successfully..!!</h2>";
					} else {
						echo "<h2 style='color:red;'>Oops....!!!<br>Ticket Booking Failed..!!</h2>";
					}
				}
			?>
		</div>

		<div class="ui stackable grid">
			<div class="five wide column"></div>
			<div class="six wide column">
				<div class="ui blue raised segment">
					<table class="ui table" style="border-style: none;">
						<?php
							$ticketNumber = "";
							if(!empty($_GET['ticketNumber'])){
								$ticketNumber = $_GET['ticketNumber'];
							}
							$sql = "select Ticket_Id, Movie_Name, Theater_Name, Date, Slot, Cost, No_Of_Persons, Total_Cost from Tickets where Ticket_Id=".$ticketNumber." and User_Id = ".$_SESSION['id']."";

							$result = $con->query($sql);

							if($result)
							{
								if($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										echo '
											<tr>
												<td><label><b>Ticket Id</b></td>
												<td>'.$row['Ticket_Id'].'</td>
											</tr>
											<tr>
												<td>
													<label><b>Movie Name</b></label>
												</td>
												<td>'.$row['Movie_Name'].'</td>
											</tr>
											<tr>
												<td><label><b>Cost per head</b></td>
												<td>'.$row['Cost'].'</td>
											</tr>
											<tr>
												<td>
													<label><b>Theater</b></label>
												</td>
												<td>'.$row['Theater_Name'].'</td>
											</tr>
											<tr>
												<td><label><b>Date</b></td>
												<td>'.$row['Date'].'</td>
											</tr>
											<tr>
												<td><label><b>Slot</b></td>
												<td>'.$row['Slot'].'</td>
											</tr>
											<tr>
												<td><label><b>Number of Persons</b></td>
												<td>'.$row['No_Of_Persons'].'</td>
											</tr>
											<tr>
												<td><label><b>Total Cost</b></td>
												<td>'.$row['Total_Cost'].'</td>
											</tr>
										';
									}
								}
							} else {
								echo "
									<center>
										<h3 style='color: red;'>Issue in booking ticket</h3>
									</center>
								";
							}
						?>
						<tr>
							<td colspan="2">
								<center>
									<a href="./viewAllTickets.php">
										<button class="ui grey button">View all Booked Tickets</button>
									</a>
								</center>
							</td>
						</tr>
				</div>
			</div>
		</div>
	</div>

</body>
</html>