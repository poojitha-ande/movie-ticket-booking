<?php
	session_start();
	include './menu.php';
	include './dbConnection.php';
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

	<div class="ui stackable container grid">
		
		<div class="ui sixteen wide column">
			<div class="ui blue raised centered header segment">
				All Tickets
			</div>
		</div>

<?php
	$sql = "select Ticket_Id, Movie_Name, Theater_Name, Date, Slot, Cost, No_Of_Persons, Total_Cost from Tickets where User_Id = ".$_SESSION['id']."";

		$result = $con->query($sql);
		$ticketCount = 0;

		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$ticketCount++;
				echo '

		<div class="four wide column">
			<div class="ui raised pink segment">
				<div class="ui raised blue centered header segment">Ticket - '.$ticketCount.'</div>
					<table class="ui table" style="border: none;">
						<tr>
							<td>Ticket Id</td>
							<td>'.$row['Ticket_Id'].'</td>
						</tr>
						<tr>
							<td>Movie Name</td>
							<td>'.$row['Movie_Name'].'</td>
						</tr>
						<tr>
							<td>Theater</td>
							<td>'.$row['Theater_Name'].'</td>
						</tr>
						<tr>
							<td>Date</td>
							<td>'.$row['Date'].'</td>
						</tr>
						<tr>
							<td>Slot</td>
							<td>'.$row['Slot'].'</td>
						</tr>
						<tr>
							<td>Reserved Seats</td>
							<td>'.$row['No_Of_Persons'].'</td>
						</tr>
						<tr>
							<td>Total Cost</td>
							<td>'.$row['Total_Cost'].'</td>
						</tr>
					</table>
				
				</div>
			</div>';
			}
		}
?>
	</div>

</body>
</html>