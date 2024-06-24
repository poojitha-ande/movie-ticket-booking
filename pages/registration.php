<?php
	if($_POST){
		$Fullname = $_POST['fullname'];
		$Gmail = $_POST['gmail'];
		$MobileNumber = $_POST['mobile'];
		$Password = $_POST['Password'];
		$Gender = $_POST['gender'];
		$Highest_Qualification = $_POST['dropdown'];
		$Checkbox = $_POST['checkbox'];
		$userType = "normalUser";
	

	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "Movie_Ticket_Booking";

	$con = new mysqli($server, $username, $password, $database);

	if($con->connect_error){
		echo "mysql is not connected";
	}
	else{
		//echo "mysql is connected";

		
	}

	$sql = "INSERT INTO Users(Name, Gmail, Mobile_Number, Password, Gender, Highest_qualification, consent, TypeOfUser) values('".$Fullname."','".$Gmail."','".$MobileNumber."','".$Password."','".$Gender."','".$Highest_Qualification."','".$Checkbox."', '".$userType."')";

	if($con->query($sql)==TRUE){
		//echo "row added successfully";
		echo '<div class="ui mini modal">
				<i class="green circle close icon"></i>
				<div class="content">
					<h3 style="color: green;"><b>Sucessfully registered...!!!</b></h3>
				</div>
		  	  </div>';
	}
	else
	{
		//echo "row not added";
		echo "<div class='ui mini modal'>
				<i class='red circle close icon'></i>
				<div class='content'>
					<h3 style='color: red;''><b>failed to register...!!!</b></h3>
				</div>
		  	  </div>";
	}

	$con->close();

	/*echo "<div style = 'text-align:center'>
	fullname = " . $Fullname. "<br>
	gmail = " . $Gmail . "<br>
	mobile_number = " . $MobileNumber . "<br>
	password = " .$Password . "<br>
	gender = " . $Gender . "<br>
	qualification = " . $Highest_Qualification . "<br>
	Checkbox = " . $Checkbox . "<br>
	</div>";*/
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
		<style type="text/css">
			.invalid {
				color: red;
			}

			.valid {
				color: green;
			}

		</style>
	</head>
	<body>

		<?php
			include "./menu.php";
		?>

		<div class="ui stackable centered grid">
			<div class="six wide column">
				<div class="ui piled segment">
					<div class="ui teal raised segment">

						<a class="ui huge red ribbon label">Registration</a>
						<!-- <div class="ui teal centered header">
							<div class="ui blue segment">
								<h3 class="ui blue header">Registration form</h3>
							</div>
						</div> -->

						<!-- form code starts here -->
						<form class="ui form" method="post" action="./registration.php">
							<div class="ui field">
								<label>Fullname <span style="color:red;">*</span> :</label>
								<input type="text" name="fullname" placeholder="Enter your fullname"required>
							</div>
							<div class="ui field">
								<label>Gmail <span style="color:red;">*</span> :</label>
								<input type="email" name="gmail" placeholder="Enter your gmail" required>
							</div>

							<div class="ui field">
								<label>Mobile Number <span style="color:red;">*</span> :</label>
								<input type="text" id="mobile" name="mobile" pattern="^[6-9]\d{9}$" placeholder="Enter your mobile number" maxlength="10" required>
							</div>

							<div id="message1">
								<p class="invalid" id="mobilematch">Starting digit must be 6,7,8 or 9 and it sholud contain 10 digits</p>
							</div>

							<div class="ui field">
								<label>Password <span style="color:red;">*</span> :</label>
								<input type="password" name="Password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter password" required>
							</div>

							<div id="message">
							  <h4>Password must contain the following:</h4>
							  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
							  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
							  <p id="number" class="invalid">A <b>number</b></p>
							  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
							</div>

							<div class="ui field">
								<input type="password" name="Password" placeholder="Confirm password" required id="cpwd">
							</div>

							<div id="message2">
								<p class="invalid" id="pwdMatch">Password should match</p>
							</div>

							<div class="ui field">
								<div class="ui radio">
									<label>Gender <span style="color:red;">*</span> :</label>
									
									<input type="radio" name="gender" value="male">
									<label>Male</label>
									
									<input type="radio" name="gender" value="female">
									<label>Female</label>
								</div>
							</div>
							<div class="ui field">
								<label>Highest qualification <span style="color:red;">*</span> :</label>
								<select  class="ui fluid dropdown" name="dropdown">
									<option value="">Highest qualification:</option>
									<option value="BTech">BTech</option>
									<option value="Degree">Degree</option>
									<option value="PG">PG</option>
									<option value="MBA">MBA</option>
									<option value="MTech">MTech</option>
								</select>
							</div>
							<div class="ui field">
								<div class="ui checkbox">
									<input type="checkbox" name="checkbox" value="1"required>
									<label>I agree to submit the form</label>
								</div>
							</div>
							<div class="ui field">
								<input class="ui primary button" type="submit" value="Register"/>
							</div>
						</form>
						<!-- form code ends here -->
					</div>
				</div>
			</div>
		</div>

<script>
	$('.ui.dropdown').dropdown();

	//password validation
	var myInput = document.getElementById("psw");
	var letter = document.getElementById("letter");
	var capital = document.getElementById("capital");
	var number = document.getElementById("number");
	var length = document.getElementById("length");

	document.getElementById("message").style.display="none";

	myInput.onfocus = function() {
    	document.getElementById("message").style.display = "block";
    }

    myInput.onblur = function() {   
    	document.getElementById("message").style.display = "none";
    }


    myInput.onkeyup = function() {
	  // Validate lowercase letters
	   var lowerCaseLetters = /[a-z]/g;
	   if(myInput.value.match(lowerCaseLetters)) {  
	    letter.classList.remove("invalid");
	    letter.classList.add("valid");
	  } else {
	    letter.classList.remove("valid");
	    letter.classList.add("invalid");
	  }

	  // Validate capital letters
	  var upperCaseLetters = /[A-Z]/g;
	  if(myInput.value.match(upperCaseLetters)) {  
	    capital.classList.remove("invalid");
	    capital.classList.add("valid");
	  } else {
	    capital.classList.remove("valid");
	    capital.classList.add("invalid");
	  }

	  // Validate numbers
	  var numbers = /[0-9]/g;
	  if(myInput.value.match(numbers)) {  
	    number.classList.remove("invalid");
	    number.classList.add("valid");
	  } else {
	    number.classList.remove("valid");
	    number.classList.add("invalid");
	  }
	  
	  // Validate length
	  if(myInput.value.length >= 8) {
	    length.classList.remove("invalid");
	    length.classList.add("valid");
	  } else {
	    length.classList.remove("valid");
	    length.classList.add("invalid");
	  }
	}

	//confirm password
	var message2 = document.getElementById("message2");
	var passMatch = document.getElementById('pwdMatch');


	var confPwd = document.getElementById('cpwd');
	document.getElementById("message2").style.display="none";


	confPwd.onfocus = function() {
    	document.getElementById("message2").style.display = "block";
    }

    confPwd.onblur = function() {   
    	document.getElementById("message2").style.display = "none";
    }

	confPwd.onkeyup = function() {
		if(myInput.value===cpwd.value) {
			passMatch.classList.remove("invalid");
			passMatch.classList.add("valid");
			passMatch.innerHTML="Password Matched";
		} else {
			passMatch.classList.remove("valid");
	    	passMatch.classList.add("invalid");
	    	passMatch.innerHTML="Password should match";
		}
	}


	//mobilenumber
	var message1 = document.getElementById("message1");
	document.getElementById('message1').style.display = "none";
	var mblmatch = document.getElementById('mobilematch');
	var mobile = document.getElementById('mobile');

	mobile.onfocus = function() {
    	document.getElementById("message1").style.display = "block";
    }

    mobile.onblur = function() {   
    	document.getElementById("message1").style.display = "none";
    }

	mobile.onkeyup = function() {
		var mobilePattern = /^[6-9]\d{9}$/;
		if(mobile.value.match(mobilePattern)){
			mblmatch.classList.remove("invalid");
			mblmatch.classList.add("valid");
		}else{
			mblmatch.classList.remove("valid");
			mblmatch.classList.add("invalid");
		}
	}

	$('.mini.modal').modal('show');

</script>
	</body>
</html>