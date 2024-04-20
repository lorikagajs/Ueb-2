<?php
session_start();

$valid_email = $valid_password = "";

if (isset($_SESSION['user'])) {
    $user_data = $_SESSION['user'];
    $valid_email = $user_data['email'];
    $valid_password = $user_data['password']; 
} else {
    // if user data is not set, do not redirect to signup page
    $user_data = null;
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === $valid_email && $password === $valid_password) {
        $_SESSION['user'] = $user_data; // Save user data in session
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid email or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login - TicketBooker</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='icon' type='image/x-icon' href='assets/icons/favicon.svg'>
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
	<div class="main">

		<div class="content">
			<div class="headers">
				<!--TODO mos me thon welcome back secilen here-->
				<h1>Welcome back</h1>
				<p>
					Don't have an account?
					<a href="signup.php">Sign up</a>.
					</h2>
			</div>

			<form action="login.php" method="post">
				<input type="email" name="email" required="required" placeholder="Email address" class="input">
				<div class="password">
					<input type="password" name="password" required="required" placeholder="Password" class="input" id="passwordInput1">
					<i class="fa-solid fa-eye-slash toggle-visibility" id="toggle-visibility-1"></i>
					<!-- <span><i class="fa-solid fa-eye" id="eye" onclick="myfunction()"></i></span>  -->
				</div>

				<div id="checkbox">
					<input type="checkbox" name="checkbox" id="check" name="remember_checkbox"> Remember me
				</div>
				<?php if (isset($error)) : ?>
					<div class="error"><?php echo $error; ?></div>
				<?php endif; ?>
				<input type="submit" name="submit" id="button" class="btn" value="Login">
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