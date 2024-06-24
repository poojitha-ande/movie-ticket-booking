<?php

	session_start();

	include "./dbConnection.php";

	if(!empty($_GET['movieId']) && !empty($_GET['movieName']) && !empty($_GET['price'])) {
		$movieId = $_GET['movieId'];
		$name = $_GET['movieName'];
		$price = $_GET['price'];
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
	<title></title>
</head>
<body>

	<?php
		include "./menu.php";
	?>

	<div class='ui stackable grid'>
	<div class='five wide column'></div>
	<div class='six wide column'>
		<form class="ui form" method="post" action="./orders.php">
		<div class='ui blue raised segment'>
			<table class="ui table" style="border-style: none;">
				<tr>
					<td><label><b>Movie Name</b></td>
					<td><input type="text" style="border:none;" name="movieName" value=<?php echo $name?> readonly></td>
					<input type="text" name="movieId" value=<?php echo $movieId?> style="display: none;">
				</tr>
				<tr>
					<td><label><b>Cost</b></td>
					<td id="cost"><input type="text" style="border:none;" name="price" value=<?php echo $price?> readonly></td>
				</tr>
				<tr>
					<td><label><b>Theater</b></td>
					<td>
					<?php
						$sql = "";
						if(empty($_GET['theaterId'])){
							$sql = "select * from Theater";
						}
						else{
							$sql = "select * from Theater where Theater_Id = '".$_GET['theaterId']."'";
						};

						$result = $con->query($sql);

						if($result->num_rows > 0){
							echo "<select class='ui dropdown' name='theaterName' required>";
							while($row = $result->fetch_assoc()){
								 echo "<option value = ".$row['Theater_Name']."> ".$row['Theater_Name']."</option>";
							}
							echo "</select>";
						}

					?>
				   
					</td>
				</tr>
				<tr>
					<td ><label><b>Slots</b></td>
					<td>
						<select class="ui dropdown" name="slot" required>
						  <option value="">Select the slot</option>
						  <option value="11:00 AM">11:00 AM</option>
						  <option value="02:00 PM">02:00 PM</option>
						  <option value="06:00 PM">06:00 PM</option>
						  <option value="09:00 PM">09:00 PM</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label><b>Select number of persons</b></td>
					<td>
						<select class="ui dropdown" id="persons" name="count" onchange = "myfunction()" required>
						  <option value="">number of Persons</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label>Date</label></td>
					<td>
						<input type="date" name="date" required>
					</td>
				</tr>
				<tr>
					<td ><label><b>Total Cost</b></td>
					<td>
						<span>
							<i class="rupee icon"></i>
							<span id="totalCost"></span>
							<input style="border: none;display: none;" id="finalCostInput" name="totalcost">
						</span>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<center>
							<?php
								echo "<a href='./orders.php'>
									<button class='ui primary button' type='submit'>Confirm Booking</button>
								</a>";
							?>
						</center>
					</td>
				</tr>
			</table>
		</div>
	</form>
	</div>
</div>



</body>
<script>
	$('.ui.dropdown').dropdown();

	var cost  = document.getElementById('cost');
	var persons = document.getElementById('persons');

	function myfunction(){

	    var cost  = <?php echo $price ?>;
		var persons = document.getElementById('persons').value;
		var finalCost=cost*persons;
		document.getElementById('totalCost').innerHTML = finalCost;
		document.getElementById('finalCostInput').value = finalCost;
	}

</script>
</html>