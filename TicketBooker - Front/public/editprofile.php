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
	<div class="container">
		<h1 class="path">
			<span>Gjon Hajdari /</span> Edit profile
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
				<div class="field">
					<div class="field-name">
						<h1>User info</h1>
					</div>
					<div class="inputs">
						<div class="input-field">
							<label>Username</label>
							<input type="text" class="input" value="Gjonhajdari">
						</div>
						<div class="input-field">
							<label>Email address</label>
							<input type="text" class="input" value="Gjonhajdari@gmail.com">
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
						</div>
						<div class="input-field">
							<label>New password</label>
							<input type="password" class="input" name="newpassword">
						</div>
						<div class="input-field">
							<label>Confirm new password</label>
							<input type="password" class="input" name="confirmpassword">
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
					<div class="btn" id="btn-primary">Save Changes</div>
					<div class="btn" id="btn-secondary">Discard</div>
				</div>
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