<?php 
session_start();
$username = $_SESSION['user_name'] ?? '';
$firstName=$_SESSION['firstName'] ?? '';
$lastName=$_SESSION['lastName'] ?? '';

$loggedIn = !empty($username); // Check if user is logged in
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact - TicketBooker</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='icon' type='image/x-icon' href='assets/icons/favicon.svg'>
	<link rel="stylesheet" href="css/palette-dark.css">
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/contact.css">
	<script src="https://kit.fontawesome.com/26e97bbe8d.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
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
			<?php if ($loggedIn) : ?> 
			<div class="right">
				<img id="profile-picture" src="assets/images/profiles/profile-picture-4.jpg" alt="" width="40" height="40"
					style="border-radius: 50%;">
				<p class="name"><?php echo $firstName . ' ' . $lastName;?></p>
			</div>

			<div class="dropdown">
				<div class="top">
					<div class="info">
						<img src="assets/images/profiles/profile-picture-4.jpg" alt="" width="50" height="50"
							style="border-radius: 50%;">
							<?php echo $firstName ." ".$lastName; ?>
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
	<div class="main">

		<div class="content">
			<div class="headers">
				<h1>
					Got anything for us?
					<br class="hidden"> Leave a <span> message!</span>
				</h1>
				<p>Or contact us via Instagram, Linkedin or Customer Support.</p>
			</div>

			<form action="" method="">
				<div class="inputs">
					<div class="info">
						<input type="text" name="name" class="input" placeholder="Your name">
						<input type="text" name="email" class="input" placeholder="Your email address">
					</div>
					<textarea name="message" id="message" placeholder="Your message" cols="30" rows="10"></textarea>
				</div>
				<input type="submit" name="submit" id="submit" class="btn" value="Send message">
			</form>
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