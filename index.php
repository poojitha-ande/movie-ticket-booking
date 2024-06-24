<?php
	session_start();
?>
<!DOCTYPE html>

<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ticket booking</title>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="./js/semantic.min.js"></script>
		<link rel="stylesheet" type="text/css" href="./css/semantic.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/components/icon.min.css">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
		<style>
			#item {
				color: white;
			}
		</style>
	</head>

	<body style>
		
		<div class="ui stackable icon big menu" style="background-color: #00695c;font-weight: bold;">
			<a class="item" id="item" href="./">
				<b>Home</b>&nbsp;
				<i class="home icon"></i>
			</a>
			<a class="item" id="item" href="./pages/movies.php">
				<b>Movies</b>&nbsp;
				<i class="full video icon"></i>
			</a>
			<a class="item" id="item" href="./pages/theaters.php">
				<b>Theaters</b>&nbsp;
				<i class="film icon"></i>
			</a>
			<a class="item" id="item" href="./pages/about.php">
				<b>About</b>&nbsp;
				<i class="info circle icon"></i>
			</a>

			<?php
				if(empty($_SESSION['id'])) {
					echo '<a class="right item" id="item" href="./pages/login.php">
							<b>Sign in/Sign up</b>&nbsp;
							<i class="sign-in icon"></i>
						</a>';
				} else {

					echo '<a class="item" id="item" href="./pages/viewAllTickets.php">
							<b>View all Tickets</b>&nbsp;&nbsp;
							<i class="money bill alternate outline icon"></i>
						  </a>';

					if($_SESSION['typeOfUser']=="admin") {
						echo '<a class="item" id="item" href="./pages/addmovie.php">
								<b>Add movies</b>&nbsp;
								<i class="plus icon"></i>
							</a>';

						echo '<a class="item" id="item" href="./pages/addtheater.php">
								<b>Add Theaters</b>&nbsp;
								<i class="plus icon"></i>
							  </a>';
					}

					echo '<a class="right item" id="item">
							<b>'.$_SESSION["name"].'</b>&nbsp;
							<i class="user icon"></i>
						</a>';

					echo '<a class="item" id="item" href="./pages/logout.php">
							<b>Sign out</b>&nbsp;
							<i class="sign-out icon"></i>
						</a>';
				}

			?>
		</div>

		<div class="ui stackable grid">
			<div class="ui one wide column"></div>
			<div class="ui fourteen wide column">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="./img/slider/img2.jpg" alt="">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="./img/slider/img1.jpeg" alt="">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="./img/slider/img.jpg" alt="">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="./img/slider/img3.jpeg" alt="">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="./img/slider/img4.jpg" alt="">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="./img/slider/img5.jpg" alt="">
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			</div>
	    </div>

	    <div class="ui stackable grid">
	    	<div class="ui one wide column"></div>
	    	<div class="fourteen wide column">
	    		<div class="ui red padded aligned raised segment">
		            <h1 style="font-size: 20px;color: red;">Movie Ticket Booking Platform</h1>
		            <div class="ui horizontal divider"><i class="star red icon"></i></div>
		            <p style="text-align: justify;font-size: 20px;text-indent: 0px;" >
		               A movie ticket booking platform is a digital service that allows users to browse, select, and purchase tickets for movies showing in theaters. These platforms typically offer a user-friendly interface where customers can search for movies by title, genre, location, or showtime. Once a movie and showtime are selected, users can choose their seats from a seating chart and proceed to payment.
		            </p>
		        </div>
	    	</div>
	    </div>
 
			
	    <div class="ui stackable grid" style="background-color:#00695c;margin-top: 30px;">
	    	<div class="two wide column"></div>
	    	<div class="three wide column" id="item">
    			<h6 id="item">Reach us on:</h6>
	    		<h6 id="item">Email: rgukt@rgukt.ac.in</h6>
	    		<h6 id="item">Phone: +91 9876543210</h6>
	    		<h6 id="item" style="margin-top: 40px;">
	    			<i class="copyright outline icon"></i>
	    			RGUKT Basar
	    		</h6>
	    	</div>
	    	<div class="six wide column"></div>
	    	<div class="three wide column">
	    		<h4 class="ui header" id="item">
	    			<i class="marker icon"></i>
	    			Address
	    		</h4>
	    		<div style="margin-left: 40px;">
	    			<h6 id="item">RGUKT Basar</h6>
		    		<h6 id="item">Basar Mdl</h6>
		    		<h6 id="item">Nirmal Dist</h6>
		    		<h6 id="item">Pin code: 504 107</h6>

		    		<button class="ui google circular icon button" title="google">
						<i class="google icon"></i>
					</button>
					<button class="ui linkedin circular icon button" title="linkedin">
						<i class="linkedin icon"></i>
					</button>
					<button class="ui instagram circular icon button" title="instagram">
						<i class="instagram icon"></i>
					</button>
					<button class="ui facebook circular icon button" title="facebook">
						<i class="facebook icon"></i>
					</button>
	    		</div>
	    	</div>
	    	<div class="four wide column">
	    	</div>
	    </div>

		<script type = "text/javascript">
			$('menu.item')
			.tab()
			;

			$('.carousel').carousel({
				interval:2000
				
			});
			
		</script>
	</body>
</html>