<?php
//include "./database/db.php";
//include "./database/userfunctions.php";
session_start();

$type = $firstName=$lastName=$name = $email = $confirmEmail = $password = $confirmPassword = $checkboxErr = "";
$typeErr =$firstNameErr=$lastNameErr= $usernameErr = $emailErr = $confirmEmailErr = $passwordErr = $confirmPasswordErr = "";
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
	//Validate FirstName
	if (empty($_POST["firstName"])) {
		$usernameErr = "First Name is required";
		$formValid = false;
	}
	else {
        $firstName = sanitizeInput($_POST["firstName"]);
        // Check if the first name contains only letters and spaces
        if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
            $firstNameErr = "Only letters and white space allowed";
			$formValid = false;
        }
	}
	
	//Validate lastName
	if (empty($_POST["lastName"])) {
		$usernameErr = "Last Name is required";
		$formValid = false;
	}else {
        $lastName = sanitizeInput($_POST["lastName"]);
        // Check if the first name contains only letters and spaces
        if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
            $lastNameErr = "Only letters and white space allowed";
        }
	}
	
	//Validate username
	if (empty($_POST["name"])) {
		$usernameErr = "Username is required";
		$formValid = false;
	} else {
		$name = sanitizeInput($_POST["name"]);
		// RegEx for username
		if (!preg_match('/^\w{5,15}$/', $name)) {
				$usernameErr = "Username must be 5-15 characters long and contain only letters, numbers, and underscores.";
				$formValid = false;
		}
	}

	// Validate email

	$emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
		$formValid = false;
	} else {
		$email = sanitizeInput($_POST["email"]);
    if (!preg_match($emailPattern, $email)) {
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
		// RegEx for password
		if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/', $password)) {
				$passwordErr = "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.";
				$formValid = false;
		}
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

		$_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;

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
	<style>


.error { 
    color: red; 
    font-size: 0.8em;
		margin-bottom: 5px
}

.input{
	margin-bottom: 14px
}
.fa-solid{
	height: 64px
}
.user-type{
	margin-bottom: 14px
}

</style>
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
				<div>
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
				
				<input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>" required="required" placeholder="First Name" class="input">
        <div class="error"><?php echo $firstNameErr; ?></div>

		<input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>" required="required" placeholder="Last Name" class="input">
        <div class="error"><?php echo $lastNameErr; ?></div>

		<input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required="required" placeholder="Username" class="input">
        <div class="error"><?php echo $usernameErr; ?></div>

				<input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required="required" placeholder="Email address" class="input">
        <div class="error"><?php echo $emailErr; ?></div>

				

				<div class="password">
        <input type="password" name="password" required="required" placeholder="Password" class="input" id="passwordInput1">
        <i class="fa-solid fa-eye-slash toggle-visibility" id="toggle-visibility-1"></i>
        </div>
        <div class="error"><?php echo $passwordErr; ?></div>


				<div class="password">
        <input type="password" name="password_confirm" required="required" placeholder="Confirm password" class="input" id="passwordInput2">
        <i class="fa-solid fa-eye-slash toggle-visibility" id="toggle-visibility-2"></i>
        </div>
        <div class="error"><?php echo $confirmPasswordErr; ?></div>

				<div id="checkbox">
					<input type="checkbox" name="checkbox" id="check" required="required">
					<p>
						I agree to the <a href="assets/extra/TERMS_AND_CONDITIONS.pdf">Terms of Use</a> & <a href="assets/extra/PRIVACY_POLICY.pdf">Privacy Policy</a>
					</p>
				</div>
				<div class="error"><?php echo $checkboxErr; ?></div>
				<input type="submit" name="submit" id="button" class="btn">
				</div>
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
