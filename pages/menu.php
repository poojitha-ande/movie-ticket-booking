<div class="ui stackable icon big menu" style="background-color: #00695c;font-weight: bold;">
	<a class="item" id="item" href="../">
		<b>Home</b>&nbsp;
		<i class="home icon"></i>
	</a>
	<a class="item" id="item" href="./movies.php">
		<b>Movies</b>&nbsp;
		<i class="full video icon"></i>
	</a>
	<a class="item" id="item" href="./theaters.php">
		<b>Theaters</b>&nbsp;
		<i class="film icon"></i>
	</a>
	<a class="item" id="item" href="./about.php">
		<b>About</b>&nbsp;
		<i class="info circle icon"></i>
	</a>

	<?php
		if(empty($_SESSION['id'])) {
			echo '<a class="right item" id="item" href="./login.php">
					<b>Sign in/Sign up</b>&nbsp;
					<i class="sign-in icon"></i>
				</a>';
		} else {

			echo '<a class="item" id="item" href="./viewAllTickets.php">
					<b>View all Tickets</b>&nbsp;&nbsp;
					<i class="money bill alternate outline icon"></i>
				  </a>';

			if($_SESSION['typeOfUser']=="admin") {
				echo '<a class="item" id="item" href="./addmovie.php">
						<b>Add movies</b>&nbsp;
						<i class="plus icon"></i>
					</a>';

				echo '<a class="item" id="item" href="./addtheater.php">
						<b>Add Theaters</b>&nbsp;
						<i class="plus icon"></i>
					  </a>';
			}


			echo '<a class="right item" id="item">
					<b>'.$_SESSION["name"].'</b>&nbsp;
					<i class="user icon"></i>
				</a>';

			echo '<a class="item" id="item" href="./logout.php">
					<b>Sign out</b>&nbsp;
					<i class="sign-out icon"></i>
				</a>';

		}

	?>

</div>