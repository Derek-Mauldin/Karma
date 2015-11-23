/******************************************
 *
 *jquery for main page
 *@author Jennifer Hung <jhung@cnm.edu>
 *
 ******************************************/

$(document).ready(function() {
			$("#toggleText").click(function() {
				$(".allListings").toggle();
			});
		});

		$(document).ready(function() {
			$(".fa-times").click(function() {
				$("#singlePanel").hide();
			});
		});

$(document).ready(function() {
	$("<a class='imgCaption'>$handle</a>").appendTo('.profileImg')
});
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});