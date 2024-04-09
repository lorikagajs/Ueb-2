<?php
include("php/ticketinfo.php");

if (isset($_POST["myTicketAdder"])) {
	$myTickets = array();

	$myTicketTitle = $_POST["myTicketTitle"];
	$myTicketDate = $_POST["myTicketDate"];
	$myTicketLocation = $_POST["myTicketLocation"];
	$myTicketType = $_POST["myTicketType"];
	$myTickets[] = new Tickets($myTicketTitle, $myTicketDate, $myTicketLocation, $myTicketType);
}


?>


<!DOCTYPE html>
<html lang="en">


<head>
	<title>TicketBooker - Profile</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='icon' type='image/x-icon' href='assets/icons/favicon.svg'>
	<link rel="stylesheet" href="css/palette-dark.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/card.css">
	<link rel="stylesheet" href="css/profile.css">
	<script src="https://kit.fontawesome.com/26e97bbe8d.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<script src="js/app.js"></script>
</head>

<body>

	<!-- Navigation Bar -->
	<nav class="navbar navbar-logged">
		<div class="navbar-content">
			<a class="navbar-logo" href="index.php">
				<img src="assets/icons/logo.svg" alt="">
			</a>
			<div class="middle">
				<a href="index.php" class="link">Home</a>
				<a href="about.php" class="link">About</a>
				<a href="contact.php" class="link">Contact</a>
				<a href="faq.php" class="link">FAQ</a>
			</div>
			<div class="right">
				<img id="profile-picture" src="assets/images/profiles/profile-picture-4.jpg" alt="" width="40" height="40" style="border-radius: 50%;">
				<p class="name">Gjon Hajdari</p>
			</div>

			<div class="dropdown">
				<div class="top">
					<div class="info">
						<img src="assets/images/profiles/profile-picture-4.jpg" alt="" width="50" height="50" style="border-radius: 50%;">
						Gjon Hajdari
					</div>

					<hr>
				</div>

				<div class="options">
					<a href="profile.php" class="option">
						<img src="assets/icons/profile.svg" alt="">
						<p>Profile</p>
					</a>
					<a href="createTicket.php" class="option">
						<img src="assets/icons/create.svg" alt="">
						<p>Create Ticket</p>
					</a>
					<a href="editProfile.php" class="option">
						<img src="assets/icons/settings.svg" alt="">
						<p>Settings</p>
					</a>
					<a href="#" class="option">
						<img src="assets/icons/logout.svg" alt="">
						<p>Log out</p>
					</a>
				</div>
			</div>

			<i class="fa-solid fa-bars-staggered" id="burger-menu"></i>
		</div>
	</nav>

	<!-- Main content -->
	<main class="container">

		<div class="top">
			<h1>Welcome back, Gjon</h1>
			<p>Take a look at all your tickets.</p>
		</div>

		<div class="tabs row g-4">
			<label class="tab col-md-6 col-lg-3">
				<input type="radio" name="type" value="all" checked>
				<div class="content">
					<div class="left">
						<img src="assets/icons/all.svg" alt="">
						<p>All tickets</p>
					</div>
					<p class="right">6</p>
				</div>
			</label>
			<label class="tab col-md-6 col-lg-3">
				<input type="radio" name="type" value="all">
				<div class="content">
					<div class="left">
						<img src="assets/icons/travel.svg" alt="">
						<p>Travels</p>
					</div>
					<p class="right">2</p>
				</div>
			</label>
			<label class="tab col-md-6 col-lg-3">
				<input type="radio" name="type" value="all">
				<div class="content">
					<div class="left">
						<img src="assets/icons/movie.svg" alt="">
						<p>Movies</p>
					</div>
					<p class="right">1</p>
				</div>
			</label>
			<label class="tab col-md-6 col-lg-3">
				<input type="radio" name="type" value="all">
				<div class="content">
					<div class="left">
						<img src="assets/icons/concert.svg" alt="">
						<p>Concerts</p>
					</div>
					<p class="right">3</p>
				</div>
			</label>
		</div>

		<hr class="divider">

		<div class="tickets row g-4">
			<?php foreach ($myTickets as $myTicket) : ?>
				<div class="col-md-6 col-lg-4">
					<div class="card">
						<div class="card-body">
							<h1 class="card-title"><?php echo $myTicket->getTitle(); ?></h1>
							<div class="date">
								<img src="assets/icons/calendar.svg" alt="">
								<div class="info">
									<p class="primary"><?php echo $myTicket->getDate(); ?></p>
									<p class="secondary">Time of event</p>
								</div>
							</div>
							<div class="location">
								<img src="assets/icons/location.svg" alt="">
								<div class="info">
									<p class="primary"><?php echo $myTicket->getLocation(); ?></p>
								</div>
							</div>
						</div>

						<hr>

						<div class="card-bottom">
							<p class="type"><?php echo $myTicket->getType(); ?></p>
							<button class="trash">
								<img src="assets/icons/trash.svg" alt="">
							</button>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<!-- <div class="col-md-6 col-lg-4">
				<div class="card">
					<div class="card-body">
						<h1 class="card-title">Title of event</h1>
						<div class="date">
							<img src="assets/icons/calendar.svg" alt="">
							<div class="info">
								<p class="primary">Date of event</p>
								<p class="secondary">Time of event</p>
							</div>
						</div>
						<div class="location">
							<img src="assets/icons/location.svg" alt="">
							<div class="info">
								<p class="primary">Location of event</p>
							</div>
						</div>
					</div>

					<hr>

					<div class="card-bottom">
						<p class="type">Ticket type</p>
						<button class="trash">
							<img src="assets/icons/trash.svg" alt="">
						</button>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="card">
					<div class="card-body">
						<h1 class="card-title">Title of event</h1>
						<div class="date">
							<img src="assets/icons/calendar.svg" alt="">
							<div class="info">
								<p class="primary">Date of event</p>
								<p class="secondary">Time of event</p>
							</div>
						</div>
						<div class="location">
							<img src="assets/icons/location.svg" alt="">
							<div class="info">
								<p class="primary">Location of event</p>
							</div>
						</div>
					</div>

					<hr>

					<div class="card-bottom">
						<p class="type">Ticket type</p>
						<button class="trash">
							<img src="assets/icons/trash.svg" alt="">
						</button>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="card">
					<div class="card-body">
						<h1 class="card-title">Title of event</h1>
						<div class="date">
							<img src="assets/icons/calendar.svg" alt="">
							<div class="info">
								<p class="primary">Date of event</p>
								<p class="secondary">Time of event</p>
							</div>
						</div>
						<div class="location">
							<img src="assets/icons/location.svg" alt="">
							<div class="info">
								<p class="primary">Location of event</p>
							</div>
						</div>
					</div>

					<hr>

					<div class="card-bottom">
						<p class="type">Ticket type</p>
						<button class="trash">
							<img src="assets/icons/trash.svg" alt="">
						</button>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="card">
					<div class="card-body">
						<h1 class="card-title">Title of event</h1>
						<div class="date">
							<img src="assets/icons/calendar.svg" alt="">
							<div class="info">
								<p class="primary">Date of event</p>
								<p class="secondary">Time of event</p>
							</div>
						</div>
						<div class="location">
							<img src="assets/icons/location.svg" alt="">
							<div class="info">
								<p class="primary">Location of event</p>
							</div>
						</div>
					</div>

					<hr>

					<div class="card-bottom">
						<p class="type">Ticket type</p>
						<button class="trash">
							<img src="assets/icons/trash.svg" alt="">
						</button>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="card">
					<div class="card-body">
						<h1 class="card-title">Title of event</h1>
						<div class="date">
							<img src="assets/icons/calendar.svg" alt="">
							<div class="info">
								<p class="primary">Date of event</p>
								<p class="secondary">Time of event</p>
							</div>
						</div>
						<div class="location">
							<img src="assets/icons/location.svg" alt="">
							<div class="info">
								<p class="primary">Location of event</p>
							</div>
						</div>
					</div>

					<hr>

					<div class="card-bottom">
						<p class="type">Ticket type</p>
						<button class="trash">
							<img src="assets/icons/trash.svg" alt="">
						</button>
					</div>
				</div>
			</div>
		</div> -->

	</main>

	<!-- Footer -->
	<footer>
		<p id="copyright">Copyright &copy; 2023 TicketBooker. All rights reserved</p>
		<div class="icons">
			<a href="https://www.instagram.com" target="_blank">
				<img src="assets/icons/instagram.svg" alt="">
			</a>
			<a href="https://www.twitter.com" target="_blank">
				<img src="assets/icons/twitter.svg" alt="">
			</a>
			<a href="https://www.linkedin.com" target="_blank">
				<img src="assets/icons/linkedin.svg" alt="">
			</a>
		</div>
		<div class="links">
			<a href="assets/extra/PRIVACY_POLICY.pdf" target="_blank" class="footer-link">Privacy Policy</a>
			<a href="assets/extra/TERMS_AND_CONDITIONS.pdf" target="_blank" class="footer-link">Terms of Use</a>
		</div>
	</footer>

</body>

</body>

</html>