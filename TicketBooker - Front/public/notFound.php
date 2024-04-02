<!DOCTYPE html>
<html lang="en">

<head>
    <title>404 Page Not Found</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/palette-dark.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/notFound.css">
	<script src="https://kit.fontawesome.com/26e97bbe8d.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<script src="js/app.js"></script>
</head>

<body>

    <!-- Navigation bar -->
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

    <div class="container">
        <div class="image">
            <img src="assets/icons/notfound.svg" alt="">
        </div>
        <div class="text">
            <h1>Opps! There are no tickets.</h1>
            <p>There are no tickets with the information you requested or you are not logged in!</p>
        </div>
        <div class="buttons">
            <a href="index.php" id="home">
                <img src="assets/icons/home.svg" alt="">
                Go to the home page
            </a>
        </div>
    </div>

</body>

</html>