<?php
// Check if the form is submitted
session_start();
$firstName = $_SESSION['firstName'] ?? '';
$lastName = $_SESSION['lastName'] ?? '';
$loggedIn =  !empty($firstName) && !empty($lastName);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST["title"];
    $date = $_POST["when_date"];
    $location = $_POST["where"];
    $type = $_POST["what"];

    // Create ticket object
    $ticket = array(
        "title" => $title,
        "date" => $date,
        "location" => $location,
        "type" => $type
    );

    try {
        // Read existing JSON data
        $jsonFile = 'ticketinfo.json';
        $jsonData = file_get_contents($jsonFile);
        $tickets = json_decode($jsonData, true);

        // Append new ticket to existing data
        $tickets[] = $ticket;

        // Write updated JSON data back to file
        if (file_put_contents($jsonFile, json_encode($tickets, JSON_PRETTY_PRINT)) !== false) {
            echo "Ticket added successfully.";
        } else {
            echo "Error writing to JSON file.";
        }
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create a Ticket</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='icon' type='image/x-icon' href='assets/icons/favicon.svg'>
    <link rel="stylesheet" href="css/palette-dark.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/createTicket.css">
    <script src="https://kit.fontawesome.com/26e97bbe8d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
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
        <div class="content">
            <h1 class="header">Create a Ticket</h1>

            <form action="" method="POST" class="inputs">
                <div class="input-field">
                    <p class="description">Type and location</p>
                    <div class="selectors">
                        <select name="what" id="select-what">
                            <option value="Movie">Movie</option>
                            <option value="Travel">Travel</option>
                            <option value="Concert">Concert</option>
                        </select>
                        <select name="where" id="select-where">
                            <option value="prishtine">Prishtinë</option>
                            <option value="mitrovice">Mitrovicë</option>
                            <option value="peje">Pejë</option>
                            <option value="prizren">Prizren</option>
                            <option value="ferizaj">Ferizaj</option>
                            <option value="gjilan">Gjilan</option>
                            <option value="gjakove">Gjakovë</option>
                        </select>
                    </div>
                </div>

                <div class="input-field">
                    <p class="description">Date and time</p>
                    <div class="selectors">
                        <input type="date" name="when_date" id="select-when">
                        <input type="time" name="when_time" id="select-when">
                    </div>
                </div>

                <div class="input-field">
                    <p class=" description">Event title</p>
                    <input type="text" name="title" placeholder="Title">
                </div>

                <div class="input-field">
                    <p class=" description">Event description</p>
                    <textarea name="description" cols="30" rows="12" placeholder="Description"></textarea>
                </div>

                <input type="submit" id="button" name="submit" value="Create ticket">
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