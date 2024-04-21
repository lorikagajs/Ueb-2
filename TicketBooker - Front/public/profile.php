<?php

session_start();

$firstName = $_SESSION['firstName'] ?? '';
$username = $_SESSION['user_name'] ?? '';
$lastName = $_SESSION['lastName'] ?? '';
$loggedIn = !empty($firstName) && !empty($lastName);

// Set cookies if the user is logged in to maintain the session state
if ($loggedIn) {
	setcookie('firstName', $firstName, time() + 3600, "/");
	setcookie('lastName', $lastName, time() + 3600, "/");
	setcookie('username', $username, time() + 3600, "/");
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["myTicketAdder"])) {
    // Retrieve ticket details from the form
    $myTicketTitle = $_POST["myTicketTitle"];
    $myTicketDate = $_POST["myTicketDate"];
    $myTicketLocation = $_POST["myTicketLocation"];
    $myTicketType = $_POST["myTicketType"];

    // Create an associative array representing the ticket
    $ticket = array(
        "title" => $myTicketTitle,
        "date" => $myTicketDate,
        "location" => $myTicketLocation,
        "type" => $myTicketType
    );

    // Load existing tickets from JSON file if it exists
    if (file_exists("profiletickets.json")) {
        $json = file_get_contents("profiletickets.json");
        $existingTickets = json_decode($json, true);

        // Check if the ticket already exists
        $ticketExists = false;
        foreach ($existingTickets as $existingTicket) {
            if ($existingTicket['title'] == $myTicketTitle && $existingTicket['date'] == $myTicketDate && $existingTicket['location'] == $myTicketLocation && $existingTicket['type'] == $myTicketType) {
                $ticketExists = true;
                break;
            }
        }

        // If the ticket doesn't exist, add it
        if (!$ticketExists) {
            $existingTickets[] = $ticket;
            file_put_contents("profiletickets.json", json_encode($existingTickets, JSON_PRETTY_PRINT));
        }
    } else {
        // If JSON file doesn't exist, create a new one with the new ticket
        file_put_contents("profiletickets.json", json_encode(array($ticket), JSON_PRETTY_PRINT));
    }
}


// Check if profiletickets.json exists
if (file_exists("profiletickets.json")) {
	// Load the ticket information from the JSON file
	$json = file_get_contents("profiletickets.json");
	// Decode the JSON data into an array of tickets
	$myTickets = json_decode($json, true);
} else {
	// If the JSON file doesn't exist or is empty, initialize an empty array
	$myTickets = array();
}


// include('find.php');

var_dump($_GET['type']);
// var_dump($_GET);
function filterTickets($tickets)
{
	$filteredTickets = [];
	if (isset($_GET['type'])) {
		foreach ($tickets as $ticket) {
			if (
				$_GET['type'] == '' || $_GET['type'] == $ticket['type']
				// ($_GET['type'] === '' || $_GET['type'] === $ticket->type) &&
				// ($_GET['when'] === '' || $_GET['when'] === $ticket->date) &&
				// ($_GET['location'] === '' || $_GET['location'] === $ticket->location)
			) {
				$filteredTickets[] = $ticket;
			}
		}
		return $filteredTickets;
	} else {
		return $tickets; // Return all tickets if no filters are applied
	}
}



?>



<!DOCTYPE html>
<html lang="en">


<head>
	<title>TicketBooker - Profile</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='icon' type='image/x-icon' href='assets/icons/favicon.svg'>
	<link rel="stylesheet" href="css/palette-dark.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/card.css">
	<link rel="stylesheet" href="css/profile.css">
	<script src="https://kit.fontawesome.com/26e97bbe8d.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<script src="js/app.js"></script>

	<script>
		const submitBtn = document.getElementById('submitBtn');

		submitBtn.addEventListener('click', function() {
			this.classList.add('submitted');
		});
	</script>
	<style>
		.tab input[type="submit"] {
			position: absolute;
			opacity: 0;
			width: 0;
			height: 0;
		}

		.tab input[type="submit"]+.content {
			cursor: pointer;
			display: flex;
			justify-content: space-between;
			align-items: center;
			font-size: 1.15rem;
			background-color: var(--foreground);
			padding: 1rem 1.25rem;
			border-radius: 0.75rem;
		}

		/* .tab input[type="submit"]:checked + .content {
  background-color: var(--accent);
} */
		#submitBtn.submitted {
			background-color: var(--accent);
		}
	</style>
</head>

<body>

	<!-- Navigation Bar -->
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
	<main class="container">

		<div class="top">
			<h1>Welcome back, <?php echo $firstName; ?></h1>
			<p>Take a look at all your tickets.</p>
		</div>


		<form action="profile.php" method="get" class="tabs row g-4">

			<label class="tab col-md-6 col-lg-3">
				<input type="submit" name="type" value="" id="submitBtn">
				<div class="content">
					<div class="left">
						<img src="assets/icons/all.svg" alt="">
						<p>All</p>
					</div>
					<p class="right"><?php ?></p>
				</div>

			</label>
			<label class="tab col-md-6 col-lg-3">
				<input type="submit" name="type" value="Travel">
				<div class="content">
					<div class="left">
						<img src="assets/icons/travel.svg" alt="">

						<p>Travels</p>

					</div>
					<p class="right"><?php   ?></p>
				</div>
			</label>
			<label class="tab col-md-6 col-lg-3">
				<input type="submit" name="type" value="Movie">
				<div class="content">
					<div class="left">
						<img src="assets/icons/movie.svg" alt="">
						<p>Movies</p>
					</div>
					<p class="right"><?php  ?></p>
				</div>
			</label>
			<label class="tab col-md-6 col-lg-3">
				<input type="submit" name="type" value="Concert">
				<div class="content">
					<div class="left">
						<img src="assets/icons/concert.svg" alt="">
						<p>Concerts</p>
					</div>
					<p class="right">  </p>
				</div>
			</label>
		</form>


		<hr class="divider">

		<div class="tickets row g-4">
			<?php foreach (filterTickets($myTickets) as $index => $myTicket) : ?>
				<div class="col-md-6 col-lg-4">
					<div class="card" id="card-<?php echo $index; ?>">
						<div class="card-body">
							<h1 class="card-title"><?php echo $myTicket['title']; ?></h1>
							<div class="date">
								<img src="assets/icons/calendar.svg" alt="">
								<div class="info">
									<p class="primary"><?php echo $myTicket['date']; ?></p>
									<p class="secondary">Time of event</p>
								</div>
							</div>
							<div class="location">
								<img src="assets/icons/location.svg" alt="">
								<div class="info">
									<p class="primary"><?php echo $myTicket['location']; ?></p>
								</div>
							</div>
						</div>

						<hr>

						<div class="card-bottom">
							<p class="type"><?php echo $myTicket['type']; ?></p>
							<button class="trash" onclick="deleteCard(<?php echo $index; ?>)">
								<img src="assets/icons/trash.svg" alt="">
							</button>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<script>
			function deleteCard(index) {
				var cardId = 'card-' + index;
				var card = document.getElementById(cardId);
				card.parentNode.removeChild(card);
				// Here, you can add additional logic to perform deletion on the server-side using AJAX or form submission.
			}
		</script>


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

</body>

</html>