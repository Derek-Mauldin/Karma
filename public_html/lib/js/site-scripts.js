
 /******************************************************************************************************
 *
 *offer form
 * submission success message
 *
 * ****************************************************************************************************/
/**********************************************************************************************
 *
 * toggle
 * click to  show side panel navigation menu items in main content area and
 * hide previous elements
 *
 *******************************************************************************************************/
function HideAllShowOne(d) {
	console.log(d);

	var menuItem = ["home-page", "profile-page", "message-page", "feed-page"];

	for(i = 0; i < menuItem.length; i++) {
		document.getElementById(menuItem[i]).style.display = "none";
	}

	if(d === 'hp') {
		document.getElementById(menuItem[0]).style.display = "inline block";
		console.log("inside hp after display set")
	} else if(d === 'pp') {
		document.getElementById(menuItem[1]).style.display = "inline block";
	} else if(d === 'mp') {
		document.getElementById(menuItem[2]).style.display = "inline block";
	} else if(d === 'fp') {
		document.getElementById(menuItem[3]).style.display = "inline block";
	}

}

/************************************************************************************************************
 * login form
 ************************************************************************************************************/
$(function() {

	$('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

/**************************************************************
 * edit profile/settings form
 **************************************************************/
$(function() {

	$('#profile-form-link').click(function(e) {
		$("#profile-form").delay(100).fadeIn(100);
		$("#edit-settings").fadeOut(100);
		$('#edit-settings-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#edit-settings-link').click(function(e) {
		$("#edit-settings").delay(100).fadeIn(100);
		$("#profile-form").fadeOut(100);
		$('#profile-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});


/***************************************************
 *recover form js
 * *************************************************/


(function($) {
	$(document).ready(function() {
		var cookieHeader = $('<a/>').attr('href', '#').attr('title', 'Click To Close').css({
			'padding': '8px',
			'position': 'fixed',
			'bottom': '0',
			'left': '0',
			'width': '100%',
			'background-color': '#353535',
			'color': '#FFF',
			'text-align': 'center'
		}).css('z-index', '9999').text('This site uses cookies to enhance user experience').addClass('close-cookie-banner');
		if ($.cookie('allow-cookies') === undefined) {
			$('body').append(cookieHeader);
		}
		$(document).on('click', '.close-cookie-banner', function(e) {
			e.preventDefault();
			$.cookie('allow-cookies', true, { expires: 1000, path: '/' });
			$(this).remove();
		});
	});
})(jQuery);



