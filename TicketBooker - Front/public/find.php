<?php

// Define the Ticket class
class Ticket {
    public $title;
    public $date;
    public $location;
    public $type;

    public function getTitle() {
        return $this->title;
    }

    public function getDate() {
        return $this->date;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getType() {
        return $this->type;
    }
}

// Read ticket data from JSON file
$ticketsData = file_get_contents("ticketinfo.json");

// Decode JSON data into an array of Ticket objects
$tickets = json_decode($ticketsData);

// Function to filter tickets
function filterTickets($tickets) {
    $filteredTickets = array();

    if (isset($_GET['find'])) {
        foreach ($tickets as $ticket) {
            if (
                ($_GET['type'] == '' || $_GET['type'] == $ticket->type) &&
                ($_GET['when'] == '' || $_GET['when'] == $ticket->date) &&
                ($_GET['location'] == '' || $_GET['location'] == $ticket->location)
            ) {
                $filteredTickets[] = $ticket;
            }
        }
        return $filteredTickets;
    } else {
        return $tickets; // Return all tickets if no filters applied
    }
}

// switch (true) {
//     case isset($_GET['find']):
//         $filteredType = $_GET['type'] ?: 'All types';
//         $filteredDate = $_GET['when'] ?: 'All dates';
//         $filteredLocation = $_GET['location'] ?: 'All locations';
//         break;
//     default:

//         break;
// }

?>




<!DOCTYPE html>
<html lang="en">

<head>
	<title>Find ticket - TicketBooker</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='icon' type='image/x-icon' href='assets/icons/favicon.svg'>
	<link rel="stylesheet" href="css/palette-dark.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/card.css">
	<link rel="stylesheet" href="css/find.css">
	<script src="https://kit.fontawesome.com/26e97bbe8d.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<script src="js/app.js"></script>
</head>

<body>

	<!-- Navigation Bar -->
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
				<img id="profile-picture" src="assets/images/profiles/profile-picture-4.jpg" alt="" width="40" height="40" style="border-radius: 50%;">
				<p class="name">Gjon Hajdari</p>
			</div>

			<div class="dropdown">
				<div class="top">
					<div class="info">
						<img src="assets/images/profiles/profile-picture-4.jpg" alt="" width="50" height="50" style="border-radius: 50%;">
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
	<main class="container">
		<div class="top">
			<h1>Available tickets</h1>
			<div class="filters">
				<p class="name">Filters</p>
				<div class="labels">

					<p class="label"><?php echo isset($_GET['type']) ? $_GET['type'] : 'All' ; ?> </p>
					<p class="label"><?php echo isset($_GET['when']) ? $_GET['when'] : 'All'; ?></p>
					<p class="label"><?php echo isset($_GET['location']) ? $_GET['location'] : 'All'; ?></p>
					<?php ?>
				</div>
			</div>
		</div>
		<div class="search">
			<div class="results">
				<p><span id="amount"><?php echo count(filterTickets($tickets)); ?></span> results found</p>
			</div>
			<button id="search" class="btn">
				<img src="assets/icons/search.svg" alt="">
				<p>Search again</p>
			</button>
		</div>
		<div class="tickets row g-4">
			<?php foreach (filterTickets($tickets) as $ticket) : ?>
				<div class="col-md-6 col-lg-4">
					<div class="card">
						<div class="card-body">
							<h1 class="card-title"><?php echo $ticket->title; ?></h1>
							<div class="date">
								<img src="assets/icons/calendar.svg" alt="">
								<div class="info">
									<p class="primary"><?php echo $ticket->date; ?></p>
									<p class="secondary">Time of event</p>
								</div>
							</div>
							<div class="location">
								<img src="assets/icons/location.svg" alt="">
								<div class="info">
									<p class="primary"><?php echo $ticket->location; ?></p>
								</div>
							</div>
						</div>
						<hr>
						<div class="card-bottom">
							<p class="type"><?php echo $ticket->type; ?></p>
							<form action="profile.php" method="post">
								<input type="hidden" name="myTicketTitle" value="<?php echo $ticket->title; ?>">
								<input type="hidden" name="myTicketDate" value="<?php echo $ticket->date; ?>">
								<input type="hidden" name="myTicketLocation" value="<?php echo $ticket->location; ?>">
								<input type="hidden" name="myTicketType" value="<?php echo $ticket->type; ?>">
								<button type="submit" class="card-button" name="myTicketAdder">Add</button>
							</form>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</main>

	<div class="modal" id="modal">
		<div class="modal-top">
			<h1>Search for a new ticket</h1>
			<button class="close" id="close">
				<img src="assets/icons/close.svg" alt="">
			</button>
		</div>
		<form action="find.php" method="GET" class="modal-search">
			<div class="options <?php echo $isDark ? '' : 'border-light'; ?>">
				<select name="type" id="select-what">
					<option value="">All</option>
					<option value="Movie">Movie</option>
					<option value="Travel">Travel</option>
					<option value="Concert">Concert</option>
				</select>
				<input type="date" name="when" id="select-when">
				<select name="location" id="select-where">
					<option value="">All</option>
					<option value="Prishtinë">Prishtinë</option>
					<option value="Mitrovicë">Mitrovicë</option>
					<option value="Pejë">Pejë</option>
					<option value="Prizren">Prizren</option>
					<option value="Ferizaj">Ferizaj</option>
					<option value="Gjilan">Gjilan</option>
					<option value="Gjakovë">Gjakovë</option>
				</select>
			</div>
			<a href="findBySearch.php">
				<input type="submit" name="find" value="Find tickets" id="find">
			</a>
		</form>
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