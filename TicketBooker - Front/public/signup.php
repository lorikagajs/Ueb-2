<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sign Up - TicketBooker</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='icon' type='image/x-icon' href="assets/icons/favicon.svg">
	<link rel="stylesheet" href="css/palette-dark.css">
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/login.css">
	<script src="https://kit.fontawesome.com/26e97bbe8d.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<script src="js/app.js"></script>
</head>

<body>

	<!-- Navigation Bar -->
	<nav class="navbar">
		<div class="navbar-content">
			<a class="navbar-logo" href="index.html">
				<img src="assets/icons/logo.svg" alt="">
			</a>
			<div class="middle">
				<a href="index.html" class="link">Home</a>
				<a href="about.html" class="link">About</a>
				<a href="contact.html" class="link">Contact</a>
				<a href="faq.html" class="link">FAQ</a>
			</div>
			<div class="right">
				<a href="signup.html" class="link">Sign Up</a>
				<a href="login.html" class="link" id="login">Log In</a>
			</div>
			<i class="fa-solid fa-bars-staggered" id="burger-menu"></i>
		</div>
	</nav>


	<!-- Main content -->
	<div class="main">

		<div class="content">
			<div class="headers">
				<h1>Create an account</h1>
				<p>
					Already have one?
					<a href="login.html">Log in</a>.
				</p>
			</div>

			<form action="" method="">

				<div class="user-type">
					<label>
						<input type="radio" name="user_type" value="INDIVIDUAL">
						Individual
					</label>
					<label>
						<input type="radio" name="user_type" value="BUSINESS">
						Business
					</label>
				</div>

				<input type="text" name="name" required="required" placeholder="Name" class="input">

				<input type="email" name="email" required="required" placeholder="Email address" class="input">

				<input type="email" name="email_confirm" required="required" placeholder="Confirm email" class="input">

				<div class="password">
					<input type="password" name="password" required="required" placeholder="Password" class="input" id="passwordInput1">
					<i class="fa-solid fa-eye-slash toggle-visibility" id="toggle-visibility-1"></i>
				</div>

				<div class="password">
					<input type="password" name="password_confirm" required="required" placeholder="Confirm password" class="input" id="passwordInput2">
					<i class="fa-solid fa-eye-slash toggle-visibility" id="toggle-visibility-2"></i>
				</div>

				<div id="checkbox">
					<input type="checkbox" name="checkbox" id="check">
					<p>
						I agree to the <a href="assets/extra/TERMS_AND_CONDITIONS.pdf">Terms of Use</a> & <a href="assets/extra/PRIVACY_POLICY.pdf">Privacy Policy</a>
					</p>
				</div>
				<input type="submit" name="submit" id="button" class="btn">
			</form>
		</div>

	</div>
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

</html>