<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home - TicketBooker</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='icon' type='image/x-icon' href='assets/icons/favicon.svg'>
	<link rel="stylesheet" href="css/palette-dark.css">
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/index.css">
	<script src="https://kit.fontawesome.com/26e97bbe8d.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"
		integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<script src="js/app.js"></script>
</head>

<body>

	<!-- Navigation Bar -->
	<nav class="navbar">
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
				<a href="signup.php" class="link">Sign Up</a>
				<a href="login.php" class="link" id="login">Log In</a>
			</div>
			<i class="fa-solid fa-bars-staggered" id="burger-menu"></i>
		</div>
	</nav>

	<!-- Main content -->
	<main>
		<div class="content">
			<h1 id="title">
				Book tickets
				<br>anywhere, all in <span id="accent">one place</span>
			</h1>

			<div class="options">
				<p>What, when, where?</p>
				<?php include "../src/modules/ticketfinder.php" ?>
				<div class="selectors">
					<select name="type" id="select-what" required>
						<option value="" disabled selected>Type</option>
						<option value="Movie">Movie</option>
						<option value="Travel">Travel</option>
						<option value="Concert">Concert</option>
					</select>
					<input type="date" name="date" id="select-when" required>
					<select name="location" id="select-where" required>
						<option value="" disabled selected>Location</option>
						<option value="prishtine">Prishtinë</option>
						<option value="mitrovice">Mitrovicë</option>
						<option value="peje">Pejë</option>
						<option value="prizren">Prizren</option>
						<option value="ferizaj">Ferizaj</option>
						<option value="gjilan">Gjilan</option>
						<option value="gjakove">Gjakovë</option>
					</select>
				</div>
			</div>

			<button class="btn" id="findTicketsbtn" name="submit">
				Find tickets
				<img src="assets/icons/arrow.svg" alt="">
			</button>
			<br>
			<div>

			</div>
		</div>

		<img src="assets/images/tickets.png" alt="Tickets" id="tickets" height="500">
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
	</form>
</body>

</html>