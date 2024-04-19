<?php 
session_start();
$firstName = $_SESSION['firstName'] ?? '';
$lastName = $_SESSION['lastName'] ?? '';
$loggedIn = !empty($firstName) && !empty($lastName);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="Bootstrap" href="Bootstrap">
	<title>FAQ</title>
	<link rel="stylesheet" href="css/palette-dark.css">
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/createTicket.css">
	<link rel="stylesheet" href="css/faq.css">
	<script src="https://kit.fontawesome.com/26e97bbe8d.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"
		integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
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
			<?php if ($loggedIn) : ?> 
			<div class="right">
				<img id="profile-picture" src="assets/images/profiles/profile-picture-4.jpg" alt="" width="40" height="40"
					style="border-radius: 50%;">
				<p class="name"><?php echo $username;?></p>
			</div>

			<div class="dropdown">
				<div class="top">
					<div class="info">
						<img src="assets/images/profiles/profile-picture-4.jpg" alt="" width="50" height="50"
							style="border-radius: 50%;">
							<?php echo $firstName. ' ' .$lastName; ?>
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

		<div class="top">
			<h1 class="title">Frequently Asked Questions</h1>
			<p>
				Got any other questions? <a href="contact.php">Contact us</a></txt>
			</p>
			</p>
		</div>
		<br>

		<div class="questionblock">
			<hr class="questionhr">
			<div class="questionoverlayer">
				<div class="questionholder">
					<p class="textparagraph">
						What is TicketBooker?
					</p>
				</div>

				<div class="questionimg">
					<img src="assets/icons/dropdown.svg" alt="">
				</div>
			</div>
		</div>
		<div class="questiondropdown">
			TicketBooker is the first ever website in Kosovo where the citizens of Kosovo can book tickets all around Kosovo,
			starting from traveling tickets to movies and concerts!
		</div>


		<div class="questionblock">
			<hr class="questionhr">
			<div class="questionoverlayer">
				<div class="questionholder">
					<p class="textparagraph">
						What kind of tickets can I buy?
					</p>

				</div>

				<div class="questionimg">
					<img src="assets/icons/dropdown.svg" alt="">
				</div>

			</div>
		</div>
		<div class="questiondropdown">
			We offer tickets from any concert, travel, movie that is avaliable in Kosovo.
			If you have any other ideas that can help and make the page better, you can contact
			us at the contact forum!

		</div>


		<div class="questionblock">
			<hr class="questionhr">
			<div class="questionoverlayer">
				<div class="questionholder">
					<p class="textparagraph">
						Is there a return policy?
					</p>

				</div>

				<div class="questionimg">
					<img src="assets/icons/dropdown.svg" alt="">
				</div>

			</div>
		</div>
		<div class="questiondropdown">
			Yes, at TicketBooker we have a return policy where you may return your tickets to us for a full refund.
			You can return the tickets within 30 days after your purchase!

		</div>


		<div class="questionblock">
			<hr class="questionhr">
			<div class="questionoverlayer">
				<div class="questionholder">
					<p class="textparagraph">
						Can I type any price that I want on the tickets I am selling?
					</p>

				</div>

				<div class="questionimg">
					<img src="assets/icons/dropdown.svg" alt="">
				</div>

			</div>
		</div>
		<div class="questiondropdown">
			Yes you technically can, but if the price is way above the market price of that ticket it will get taken down
			and with a few warnings of ticket overpricing it may cause an account ban!
		</div>


		<div class="questionblock">
			<hr class="questionhr">
			<div class="questionoverlayer">
				<div class="questionholder">
					<p class="textparagraph">
						How much tickets can I create and sell at the same time?
					</p>

				</div>

				<div class="questionimg">
					<img src="assets/icons/dropdown.svg" alt="">
				</div>

			</div>
		</div>
		<div class="questiondropdown">
			You can create as many tickets as you want and sell them at the same time if you want to,
			we don't prefer it because this might cause database problems!
		</div>


		<div class="questionblock">
			<hr class="questionhr">
			<div class="questionoverlayer">
				<div class="questionholder">
					<p class="textparagraph">
						What kinds of tickets are created the most ?
					</p>

				</div>

				<div class="questionimg">
					<img src="assets/icons/dropdown.svg" alt="">
				</div>

			</div>
		</div>
		<div class="questiondropdown">
			Our users mostly create and sell movie and travel tickets,
			but that doesn't mean concert tickets aren't sold just not as much as the others. </div>

		<div class="questionblock">
			<hr class="questionhr">
			<div class="questionoverlayer">
				<div class="questionholder">
					<p class="textparagraph">
						Do costumers get any discounts from buying more than 2-3 tickets?
					</p>

				</div>

				<div class="questionimg">
					<img src="assets/icons/dropdown.svg" alt="">
				</div>

			</div>
		</div>
		<div class="questiondropdown">
			Yes our loyal costumers get 10% or more discount depending
			on how many tickets they have bought in the past year or so.

		</div>


		<div class="questionblock">
			<hr class="questionhr">
			<div class="questionoverlayer">
				<div class="questionholder">
					<p class="textparagraph">
						What is TicketBooker?
					</p>

				</div>

				<div class="questionimg">
					<img src="assets/icons/dropdown.svg" alt="">
				</div>

			</div>
		</div>
		<div class="questiondropdown">
			Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex commodi numquam ad veritatis vitae, velit
			rem error ipsum aperiam tempore delectus possimus dolores totam, aliquam tempora necessitatibus aut laborum culpa!
		</div>


		<div class="questionblock">
			<hr class="questionhr">
			<div class="questionoverlayer">
				<div class="questionholder">
					<p class="textparagraph">
						What is TicketBooker?
					</p>

				</div>

				<div class="questionimg">
					<img src="assets/icons/dropdown.svg" alt="">
				</div>

			</div>
		</div>
		<div class="questiondropdown">
			Lorem ipsum dolor sit amet,
			consectetur adipisicing elit.
			Alias officiis suscipit, a fugit similique neque,
			beatae est nostrum facere, nam error ut numquam architecto repudiandae? Eius vel ducimus repellat in.
		</div>


		<div class="questionblock">
			<hr class="questionhr">
			<div class="questionoverlayer">
				<div class="questionholder">
					<p class="textparagraph">
						What is TicketBooker?
					</p>

				</div>

				<div class="questionimg">
					<img src="assets/icons/dropdown.svg" alt="">
				</div>

			</div>
		</div>
		<div class="questiondropdown">
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus soluta quisquam assumenda rem
			totam excepturi a ipsam mollitia similique! Molestiae dolorum
			commodi officia unde. Facilis hic explicabo voluptatum asperiores ipsum!

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