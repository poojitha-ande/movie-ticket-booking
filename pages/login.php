<?php
	if($_POST) {
		$Username = $_POST['uname'];
		$Password = $_POST['password'];

		include "./dbConnection.php";

		$sql = "select * from Users where Name = '".$Username."' AND Password = '".$Password."'";
		$result = $con->query($sql);

		if($result->num_rows == 1){
			$row = $result->fetch_assoc();
			session_start();
			$_SESSION['typeOfUser'] = $row["TypeOfUser"];
			$_SESSION["id"] = $row["User_id"];
			$_SESSION["name"] = $row["Name"];
			header("Location:../index.php");
		}
		else{
			echo "<div class='ui mini modal'>
					<i class='red circle close icon'></i>
					<div class='content'>
						<h3 style='color:red';><b>Log in failed</b></h3>
						<h3 style='color:red';><b>Check your credentials or reach out to admin</b></h3>
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
		<script>
			function registration() {
				location.href="./registration.php";
			}
		</script>
	</head>
	<body>
		<?php
			include "./menu.php";
		?>
		<div class="ui stackable grid" style="margin-top: 40px;">
			<div class="five wide column"></div>
			<div class="six wide column">
				<form class="ui form" method="post">
					<div class="ui teal piled segment">
						<div class="ui teal raised centered raised segment header">LOG IN</div>
						<div class="ui teal raised segment">
							<div class="ui field">
								<label>Username</label>
								<div class="ui left icon input">
								<input type="text" name="uname" placeholder="Enter the name" required >
								<i class="user icon"></i>
								</div>
							</div>
							<div class="ui field">
								<label>Password</label>
								<div class="ui left icon input">
								<i class="eye slash icon"></i>
								<input type="password" name="password" placeholder="Password" required>
								</div>
							</div>
							<div class="ui field">
								<input class="ui primary button" type="submit" value="Log in"/>
								<div class="ui negative button" onclick="registration()">Sign up</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
<script>
	$('.mini.modal').modal('show');
</script>
	</body>
</html>