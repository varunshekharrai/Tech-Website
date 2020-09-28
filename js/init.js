$(document).ready(function(){
	$('.modal').modal();
	$('.sidenav').sidenav();
	$('.slider').slider({full_width: true});
	$('.parallax').parallax();
	$('.carousel').carousel({
		numVisible: 3,
		shift: 55,
		padding: 55
	});
	$('.blogtopic, .blogcontent').characterCounter();
});
document.addEventListener('DOMContentLoaded', function() {
	M.AutoInit();
});
