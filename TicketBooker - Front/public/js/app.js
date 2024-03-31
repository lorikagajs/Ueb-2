$(document).ready(() => {
	// Navbar links dropdown
	$("#burger-menu").click(() => {
		$(".middle").toggle();
		$(".right").toggle();
		$('.dropdown').hide();
	});

	// Profile options dropdown
	$('.navbar-logged .right').click(() => {
		$('.dropdown').toggle();
	});

	// Toggle password function
	$('#toggle-visibility-1').on('click', function(e) {
		e.preventDefault;
		const password = document.querySelector('#passwordInput1');
		const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
		password.setAttribute('type', type);
		// toggle the eye icon
		this.classList.toggle('fa-eye');
	});
	
	$('#toggle-visibility-2').on('click', function(e) {
		e.preventDefault;
		const password = document.querySelector('#passwordInput2');
		const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
		password.setAttribute('type', type);
		// toggle the eye icon
		this.classList.toggle('fa-eye');
	});

	// Open the modal
	$('#search').click(() => {
		$('.container').addClass('blurred');
		$('#modal').css('top', '200px');
	});

	// Close the modal
	$('#close').click(() => {
		$('.container').removeClass('blurred');
		$('#modal').css('top', '-600px');
	});

	// Toggle the FAQ question
	$('.questionblock').click(function() {
		var DropDownElement = $(this).next('.questiondropdown');
		DropDownElement.slideToggle();
		var LocateFigure = $(this).find('.questionimg');
		LocateFigure.toggleClass('rotate');
		LocateFigure.animate();
		$(this).toggleClass('bg');

	});
});