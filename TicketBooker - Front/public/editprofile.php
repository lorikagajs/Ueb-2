
<?php 
//include "./database/db.php";
//include "./database/userfunctions.php";
session_start();


$firstName = $_SESSION['firstName'] ?? '';
$lastName = $_SESSION['lastName'] ?? '';
$loggedIn =  !empty($firstName) && !empty($lastName);


// Check if user is logged in
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}
$firstName= $_SESSION['firstName'] ?? '';
$lastName =$_SESSION['lastName'] ?? '';
$username = $_SESSION['user_name'] ?? '';
$email = $_SESSION['user_email'] ?? '';
$oldPassword = $newPassword = $confirmPassword = "";
$usernameErr = $emailErr = $oldPasswordErr = $newPasswordErr = $confirmPasswordErr = "";
$formValid = true;

if (isset($_POST['submit'])) {
    // Validate username
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

    // Validate old password
    if (empty($_POST["oldpassword"])) {
        $oldPasswordErr = "Old Password is required";
        $formValid = false;
    } else {
        $oldPassword = $_POST["oldpassword"];
		$hashedOldPasswordFromSession = $_SESSION['user_password'];
        if (!$hashedOldPasswordFromSession || $oldPassword !== $hashedOldPasswordFromSession) {
            $oldPasswordErr = "Incorrect old password";
            $formValid = false;
        }
    }

    // Validate new password
    if (empty($_POST["newpassword"])) {
        $newPasswordErr = "New Password is required";
        $formValid = false;
    } else {
        $newPassword = sanitizeInput($_POST["newpassword"]);
		if (strlen($newPassword) < 8) {
            $newPasswordErr = "Password must be at least 8 characters long";
            $formValid = false;
        }
    }

    // Validate confirm new password
    if (empty($_POST["confirmpassword"])) {
        $confirmPasswordErr = "Please confirm your new password";
        $formValid = false;
    } else {
        $confirmPassword = sanitizeInput($_POST["confirmpassword"]);
        if ($confirmPassword !== $newPassword) {
            $confirmPasswordErr = "Passwords do not match";
            $formValid = false;
        }
    }

    if ($formValid) {
        // Here you would handle updating the user information in your database
        // For demonstration purposes, we're just updating the session values
		

        $_SESSION['user_name'] = $username;
        $_SESSION['user_email'] = $email;
		$_SESSION['user_password'] = $newPassword;
        // You should also handle updating the password, similar to how you did in signup.php
        // For security, it's recommended to hash the new password before storing
        // $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        // Update the password in the database
        // updateUserPassword($_SESSION['user_email'], $hashedNewPassword);

        // Redirect to a success page or display a success message
        // header("Location: profile.php");
        // exit();
        echo "User info updated successfully!";
    }
}

// Sanitize input function
function sanitizeInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Edit profile - TicketBooker</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='icon' type='image/x-icon' href='assets/icons/favicon.svg'>
	<link rel="stylesheet" href="css/palette-dark.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/editprofile.css">
	<script src="https://kit.fontawesome.com/26e97bbe8d.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"
		integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<script src="js/app.js"></script>
</head>

<body>

	<!-- Navigation bar -->
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
						<a href="logout.php" class="option">
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
		<h1 class="path">
			<span><?php echo $firstName ." ". $lastName ; ?></span> Edit profile
		</h1>
		<div class="main">
			<div class="left">
				<form method="POST" enctype="multipart/form-data">
					<div class="field">
						<div class="field-name">
							<h1>Avatar</h1>
						</div>
						<div class="avatars">
							<label>
								<input type="radio" name="avatar">
								<img src="assets/images/profiles/profile-picture-1.jpg">
							</label>
							<label>
								<input type="radio" name="avatar">
								<img src="assets/images/profiles/profile-picture-2.jpg">
							</label>
							<label>
								<input type="radio" name="avatar">
								<img src="assets/images/profiles/profile-picture-3.jpg">
							</label>
							<label>
								<input type="radio" name="avatar" checked="checked">
								<img src="assets/images/profiles/profile-picture-4.jpg">
							</label>
							<label>
								<input type="radio" name="avatar">
								<img src="assets/images/profiles/profile-picture-5.jpg">
							</label>
							<label>
								<input type="radio" name="avatar">
								<img src="assets/images/profiles/profile-picture-6.jpg">
							</label>
							<label>
								<input type="radio" name="avatar">
								<img src="assets/images/profiles/profile-picture-7.jpg">
							</label>
							<label>
								<input type="radio" name="avatar">
								<img src="assets/images/profiles/profile-picture-8.jpg">
							</label>
							<label>
								<input type="radio" name="avatar">
								<img src="assets/images/profiles/profile-picture-9.jpg">
							</label>
							<label>
								<input type="radio" name="avatar">
								<img src="assets/images/profiles/profile-picture-10.jpg">
							</label>
							<label>
								<input type="radio" name="avatar">
								<img src="assets/images/profiles/profile-picture-11.jpg">
							</label>
							<label>
								<input type="radio" name="avatar">
								<img src="assets/images/profiles/profile-picture-12.jpg">
							</label>
						</div>
					</div>
				</form>

			</div>

			<div class="right">
				<form action="editprofile.php" method="post">
                 <div class="field">
					
					<div class="field-name">
						<h1>User info</h1>
					</div>
					<div class="inputs">
						<div class="input-field">
							<label>Username</label>
							<input type="text" class="input" name="username" value="<?php echo $username; ?>">
                                <span class="error"><?php echo $usernameErr; ?></span>
						</div>
						<div class="input-field">
							<label>Email address</label>
							<input type="text" class="input" name="email" value="<?php echo $email; ?>">
                                <span class="error"><?php echo $emailErr; ?></span>
						</div>
					</div>
				</div>

				<div class="field">
					<div class="field-name">
						<h1>Password</h1>
					</div>
					<div class="inputs">
						<div class="input-field">
							<label>Old password</label>
							<input type="password" class="input" name="oldpassword">
                                <span class="error"><?php echo $oldPasswordErr; ?></span>
						</div>
						<div class="input-field">
							<label>New password</label>
							<input type="password" class="input" name="newpassword">
							<span class="error"><?php echo $newPasswordErr; ?></span>
						</div>
						<div class="input-field">
							<label>Confirm new password</label>
							<input type="password" class="input" name="confirmpassword">
							<span class="error"><?php echo $confirmPasswordErr; ?></span>
						</div>
					</div>
				</div>
				<div class="field">
					<div class="field-name">
						<h1>Appearance</h1>
					</div>
					<div class="switch-field">
						<p id="p">Light/Dark Mode</p>
						<label class="switch">
							<input type="checkbox" name="appearance" id="mode-switch">
							<span class="slider"></span>
						</label>
					</div>
				</div>

				<div class="buttons">
					<!-- <div class="btn" id="btn-primary" name="save">Save Changes</div>
					<div class="btn" id="btn-secondary">Discard</div> -->
					<button type="submit" class="btn" name="submit">Save Changes</button>
    <div class="btn" id="btn-secondary">Discard</div>

				</div>
					</form>
				
			</div>
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