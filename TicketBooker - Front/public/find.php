<!DOCTYPE html>
<html lang="en">

<head>
	<title>Find ticket - TicketBooker</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='icon' type='image/x-icon' href='assets/icons/favicon.svg'>
	<link rel="stylesheet" href="css/palette-dark.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/card.css">
	<link rel="stylesheet" href="css/find.css">
	<script src="https://kit.fontawesome.com/26e97bbe8d.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"
		integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
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
				<img id="profile-picture" src="assets/images/profiles/profile-picture-4.jpg" alt="" width="40" height="40"
					style="border-radius: 50%;">
				<p class="name">Gjon Hajdari</p>
			</div>

			<div class="dropdown">
				<div class="top">
					<div class="info">
						<img src="assets/images/profiles/profile-picture-4.jpg" alt="" width="50" height="50"
							style="border-radius: 50%;">
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
			<h1>Find tickets</h1>
			<div class="filters">
				<p class="name">Filters</p>
				<div class="labels">
					<p class="label">Movie</p>
					<p class="label">23/08/2023</p>
					<p class="label">Prishtinë</p>
				</div>
			</div>
		</div>
		<div class="search">
			<div class="results">
				<p><span id="amount">6</span> results found</p>
			</div>
			<button id="search" class="btn">
				<img src="assets/icons/search.svg" alt="">
				<p>Search again</p>
			</button>
		</div>
		<div class="tickets row g-4">
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
						<button class="card-button">Add</button>
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
						<button class="card-button">Add</button>
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
						<button class="card-button">Add</button>
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
						<button class="card-button">Add</button>
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
						<button class="card-button">Add</button>
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
						<button class="card-button">Add</button>
					</div>
				</div>
			</div>
		</div>
	</main>

	<div class="modal" id="modal">
		<div class="modal-top">
			<h1>Search for a new ticket</h1>
			<button class="close" id="close">
				<img src="assets/icons/close.svg" alt="">
			</button>
		</div>
		<form action="" class="modal-search">
			<div class="options <?php echo $isDark ? '' : 'border-light'; ?>">
				<select name="type" id="select-what">
					<option value="Movie">Movie</option>
					<option value="Travel">Travel</option>
					<option value="Concert">Concert</option>
				</select>
				<input type="date" name="when" id="select-when">
				<select name="location" id="select-where">
					<option value="prishtine">Prishtinë</option>
					<option value="mitrovice">Mitrovicë</option>
					<option value="peje">Pejë</option>
					<option value="prizren">Prizren</option>
					<option value="ferizaj">Ferizaj</option>
					<option value="gjilan">Gjilan</option>
					<option value="gjakove">Gjakovë</option>
				</select>
			</div>
			<input type="submit" name="find" value="Find tickets" id="find">
		</form>
	</div>


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

</html>