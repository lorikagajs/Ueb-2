<?php 
session_start();
$firstName = $_SESSION['firstName'] ?? '';
$lastName = $_SESSION['lastName'] ?? '';
$loggedIn =  !empty($firstName) && !empty($lastName);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>About - TicketBooker</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='icon' type='image/x-icon' href='assets/icons/favicon.svg'>
	<link rel="stylesheet" href="css/palette-dark.css">
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/about.css">
	<script src="https://kit.fontawesome.com/26e97bbe8d.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<script src="js/app.js"></script>
</head>

<body>

	<!-- Navigation Bar -->
	<nav class="navbar navbar-logged">
		<div class="navbar-content" style="height: 128px">
			<a class="navbar-logo" href="index.php">
				<img src="assets/icons/logo.svg" alt="">
			</a>
			<div class="middle">
				<a href="index.php" class="link">Home</a>
				<a href="about.php" class="link">About</a>
				<a href="contact.php" class="link">Contact</a>
				<a href="faq.php" class="link">FAQ</a>
			</div>
			<?php if ($loggedIn) : ?>
				<div class="right">
					<img id="profile-picture" src="assets/images/profiles/profile-picture-4.jpg" alt="" width="40" height="40" style="border-radius: 50%;">
				</div>

				<div class="dropdown">
					<div class="top">
						<div class="info">
							<img src="assets/images/profiles/profile-picture-4.jpg" alt="" width="50" height="50" style="border-radius: 50%;">
							<?php echo $firstName . ' ' . $lastName; ?>
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
			<?php else : ?> <!-- Show if user is not logged in -->
				<div class="right">
					<a href="signup.php" class="link">Sign Up</a>
					<a href="login.php" class="link" id="login">Log In</a>
				</div>
			<?php endif; ?>
			<i class="fa-solid fa-bars-staggered" id="burger-menu"></i>
		</div>
	</nav>

	<!-- Main content -->
	<div class="container">

		<div class="hero">
			<h1>So <span class="accent">who</span> are we exactly?</h1>
			<img src="assets/icons/path.svg" alt="">
		</div>

		<div class="section">
			<p>
				TicketBooker is an online platform for <span>purchasing tickets</span> to concerts,
				movies or flights internationally. Our services make it easy to book tickets
				from several booking websites and make them avaliable in one place, in a
				<span>single transaction</span>, whether you are in the UK, the USA or Europe. <span>No fees</span>
				are charged at the point of purchase or after your event has ended.
			</p>

			<img src="assets/icons/ticket.svg" alt="Ticket icon">
		</div>

		<div class="section">
			<img src="assets/icons/world.svg" alt="World icon">

			<p>
				TicketBooker operates in all <span> EU countries, Iceland, Norway and Switzerland.</span>
				The founding team of TicketBooker was made up of entrepreneurs from
				London, Oslo and Paris. The company now employs <span>120 people</span>. The
				service's technical platform has a back-end computer server with support of
				Citrix/Dell shared network servers and database.
			</p>
		</div>

		<div class="section">
			<p>
				In September 2015, TicketBooker partnered with <span>Worldline</span>, one of Europe's
				leading provider of payment services, for TicketBooker's European ticket
				booking services, allowing the company to <span>expand its presence</span> to 2,500+
				Live Nation & AXS corporate clients as well as 20,000+ independent music
				venues and promoters. TicketBooker has recieve<span>d $1.3m </span>in fu nding from
				City Index Ventures in May 2014.
			</p>

			<img src="assets/icons/increase.svg" alt="Ticket icon">
		</div>

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