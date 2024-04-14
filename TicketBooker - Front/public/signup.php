<?php
//include "./database/db.php";
//include "./database/userfunctions.php";
session_start();

$type = $name = $email = $confirmEmail = $password = $confirmPassword = $checkboxErr = "";
$typeErr = $usernameErr = $emailErr = $confirmEmailErr = $passwordErr = $confirmPasswordErr = "";
$checkbox = false;
$formValid = true;

//SanitizeInput FUNCTION
function sanitizeInput($input) {
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	return $input;
}

if (isset($_POST['submit'])) {
	//Validate the radio input for individual and business
	if (!isset($_POST["user_type"])) {
		$typeErr = "Please select a type";
		$formValid = false;
	} else {
		$type = sanitizeInput($_POST["user_type"]);
	}

	//Validate username
	if (empty($_POST["name"])) {
		$usernameErr = "Username is required";
		$formValid = false;
	} else {
		$name = sanitizeInput($_POST["name"]);
	}

	// Validate email
	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
		$formValid = false;
	} else {
		$email = sanitizeInput($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
			$formValid = false;
		}
	}
	// Validate confirm email
	// if (empty($_POST["email_confirm"])) {
	// 	$confirmEmailErr = "Please confirm your email";
	// 	$formValid = false;
	// } else {
	// 	$confirmEmail = sanitizeInput($_POST["email_confirm"]);
	// 	if ($confirmEmail !== $email) {
	// 		$confirmEmailErr = "Emails do not match";
	// 		$formValid = false;
	// 	}
	// }

	// Validate password
	if (empty($_POST["password"])) {
		$passwordErr = "Password is required";
		$formValid = false;
	} else {
		$password = sanitizeInput($_POST["password"]);
	}

	// Validate confirm password
	if (empty($_POST["password_confirm"])) {
		$confirmPasswordErr = "Please confirm your password";
		$formValid = false;
	} else {
		$confirmPassword = sanitizeInput($_POST["password_confirm"]);
		if ($confirmPassword !== $password) {
			$confirmPasswordErr = "Passwords do not match";
			$formValid = false;
		}
	}

	// Validate checkbox
	if (!isset($_POST["checkbox"])) {
		$checkboxErr = "Please accept the terms and conditions";
		$formValid = false;
	} else {
		$checkbox = true;
	}

	// if ($formValid) {
	// 	if(createUser($name, $email, $password, $type)){
    //        header("Location: ./index.php");
	// 	}
	// }
	if ($formValid) {
        // Create an array to store user data
        $user_data = array(
            'name' => $name,
            'email' => $email,
			'password' => $password,
            'user_type' => $type
        );

        // Store user data in session
        $_SESSION['user'] = $user_data;

        header("Location: index.php");
        exit();
    }
}

?>

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
				<h1>Create an account</h1>
				<p>
					Already have one?
					<a href="login.php">Log in</a>.
				</p>
			</div>

			<form action="signup.php" method="post">

				<div class="user-type">
					<label>
						<input type="radio" name="user_type" value="INDIVIDUAL" required>
						Individual
					</label>
					<label>
						<input type="radio" name="user_type" value="BUSINESS">
						Business
					</label>
				</div>
				<div class="error"><?php echo $typeErr; ?></div>
				<input type="text" name="name" required="required" placeholder="Name" class="input">

				<input type="email" name="email" required="required" placeholder="Email address" class="input">

				

				<div class="password">
					<input type="password" name="password" required="required" placeholder="Password" class="input" id="passwordInput1">
					<i class="fa-solid fa-eye-slash toggle-visibility" id="toggle-visibility-1"></i>
				</div>

				<div class="password">
					<input type="password" name="password_confirm" required="required" placeholder="Confirm password" class="input" id="passwordInput2">
					<i class="fa-solid fa-eye-slash toggle-visibility" id="toggle-visibility-2"></i>
				</div>

				<div id="checkbox">
					<input type="checkbox" name="checkbox" id="check" required="required">
					<p>
						I agree to the <a href="assets/extra/TERMS_AND_CONDITIONS.pdf">Terms of Use</a> & <a href="assets/extra/PRIVACY_POLICY.pdf">Privacy Policy</a>
					</p>
				</div>
				<div class="error"><?php echo $checkboxErr; ?></div>
				<input type="submit" name="submit" id="button" class="btn">
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
