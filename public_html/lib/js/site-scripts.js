/**********************************************************************************************
 *
 * toggle
 * click to  show side panel navigation menu items in main content area and
 * hide previous elements
 * @author  dmauldin
 *
 *******************************************************************************************************/
function HideAllShowOne(d) {
	console.log(d);

	var menuItem = ["home-page", "profile-page", "message-page", "feed-page", "logout-page", "edit-profile-page"];

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
	} else if(d === 'lp') {
		document.getElementById(menuItem[4]).style.display = "inline block";
	} else if(d === 'ep') {
		document.getElementById(menuItem[4]).style.display = "inline block";

	}

}

/************************************************************************************************************
 * login/registration  form
 * @author jhung@cnm.edu
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
 * @author jhung@cnm.edu
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

/************************************************************************************************************
 * mailbox
 * @author jhung@cnm.edu
 ************************************************************************************************************/
$(function() {

	$('#compose-wrapper-link').click(function(e) {
		$("#compose-wrapper").delay(100).fadeIn(100);
		$("#inbox-wrapper").fadeOut(100);
		$('#inbox-wrapper-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#inbox-wrapper-link').click(function(e) {
		$("#inbox-wrapper").delay(100).fadeIn(100);
		$("#compose-wrapper").fadeOut(100);
		$("#sent-wrapper").fadeOut(100);
		$('#compose-wrapper-link').removeClass('active');

		$('#sent-wrapper-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

	$('#sent-wrapper-link').click(function(e) {
		$("#sent-wrapper").delay(100).fadeIn(100);
		$("#compose-wrapper").fadeOut(100);
		$("#inbox-wrapper").fadeOut(100);
		$('#compose-wrapper-link').removeClass('active');
		$('#inbox-wrapper-link').removeClass('active');

		$(this).addClass('active');
		e.preventDefault();
	});


});


 /*******************************************************************************
 *
 *jscroll
 *
 ********************************************************************************/
$(document).ready(function() {
	// Infinite Ajax Scroll configuration
	jQuery.ias({
		container: '#feed-page', // main container where data goes to append
		item: '.panel-default', // single items
		loader: '<img src="../../img/ajax-loader.gif"/>', // loading gif
		triggerPageThreshold: 10 // show load more if scroll more than this
	});
});

$('.infinite-scroll').jscroll({
	loadingHtml: '<span class="glyphicon glyphicon-refresh glyphicon-spin"></span>',

	padding: 20,
	nextSelector: 'a.jscroll-next:last',
	contentSelector: '#panel-wrapper'
});

/*******************************************************************************
 *
 *hide/show
 *
 *******************************************************************/



