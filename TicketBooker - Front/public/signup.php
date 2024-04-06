<?php
//  if(isset($_POST['submit'])){
// 	$passwordi = $_POST['password'];
// 	$passordConfirmed =  $_POST['password_confirm'];

// 	$notTheSameMessage = "Wrong! The Password and Password Confirmed Section should be the same";
// 	$shortLengthMessage = "Wrong! It should be more than 4 characters";
// 	if ($passwordi == $passordConfirmed){

// 	} else if($passwordi !== $passordConfirmed){
// 		echo "<script>alert('$notTheSameMessage');</script>";
// 	} else if ($passwordi<4 || $passordConfirmed<4 ){
// 		echo "<script>alert('$shortLengthMessage');</script>";
// 	}
//  }
$type = $first_name = $last_name = $username = $email = $confirmEmail = $password = $confirmPassword = $checkboxErr = "";
$typeErr = $first_nameErr = $last_nameErr = $usernameErr = $emailErr = $confirmEmailErr = $passwordErr = $confirmPasswordErr = "";
$checkbox = false;
$formValid = true;
//SanitizeInput FUNCTION
function sanitizeInput($input)
{
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	// $input = preg_replace('/\s+/', '', $input);
	// $input = ucfirst($input);
	return $input;
}

// function controllPasssword($input)
// {
// 	if (strlen($input) < 8) {
// 		return false;
// 	}
// 	if (!preg_match('/[0-9]/', $input)) {
// 		return false;
// 	}
// 	if (!preg_match('/[^a-zA-Z0-9]/', $input)) {
// 		return false;
// 	}
// 	return true;
// }

if (isset($_POST['submit'])) {
	//Validate the radio input for individuall and business
	if (!isset($_POST["user_type"])) {
		$typeErr = "Please select a type";
		$formValid = false;
	} else {
		$type = sanitizeInput($_POST["user_type"]);
	}

	//Validate First Name
	if (empty($_POST["first_name"])) {
		$first_nameErr = "First Name is required";
		$formValid = false;
	} else {
		$first_name = sanitizeInput($_POST["first_name"]);
	}
	//Validate Last Name
	if (empty($_POST["last_name"])) {
		$last_nameErr = "Last Name is required";
		$formValid = false;
	} else {
		$last_name = sanitizeInput($_POST["last_name"]);
	}

	//Validate Username
	if (empty($_POST["username"])) {
		$usernameErr = "Username is required";
		$formValid = false;
	} else {
		$username = sanitizeInput($_POST["username"]);
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
	if (empty($_POST["email_confirm"])) {
		$confirmEmailErr = "Please confirm your email";
		$formValid = false;
	} else {
		$confirmEmail = sanitizeInput($_POST["email_confirm"]);
		if ($confirmEmail !== $email) {
			$confirmEmailErr = "Emails do not match";
			$formValid = false;
		}
	}

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
}

//test section
extract($_REQUEST);
$filename = 'test.txt';

$fp = fopen($filename, 'w');
fwrite($fp, 'First Name:' . $first_name . "\n");
fwrite($fp, 'First Last:' . $last_name . "\n");
fwrite($fp, 'Username:' . $username . "\n");
fwrite($fp, 'Email:' . $email . "\n");
fwrite($fp, 'Password:' . $password . "\n");
fclose($fp);

// var_dump()
var_dump($first_name);

require_once('dbconnect.php');
$query = "insert into users(first_name, last_name, username, email, password)";
$query .= "values ('$first_name', '$last_name','$username','$email' ,'$password')";
$result = mysqli_query($connection, $query);
if (!$result) {
	die("Query failed" . mysqli_error($connection));
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sign Up - TicketBooker</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta first_name="viewport" content="width=device-width, initial-scale=1.0">
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
				<input type="text" name="first_name" required="required" placeholder="First Name" class="input">
				<input type="text" name="last_name" required="required" placeholder="Last Name" class="input">
				<input type="text" name="username" required="required" placeholder="Username" class="input">

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