/*******************************************************************************************************
 *
 * header content
 *
 * navigation search bar
 *
 * .click/slide in and collapse
 *
 ******************************************************************************************************/

/*$(function () {
	$('.navbar-toggle').click(function () {
		$('.navbar-nav').toggleClass('slide-in');
		$('.side-body').toggleClass('body-slide-in');
		$('#search').removeClass('in').addClass('collapse').slideUp(200);

		// absolute positioning tweek see top comment in css
		$('.absolute-wrapper').toggleClass('slide-in');

	});

	// Remove menu for searching
	$('#search-trigger').click(function () {
		$('.navbar-nav').removeClass('slide-in');
		$('.side-body').removeClass('body-slide-in');

		/// uncomment code for absolute positioning tweek see top comment in css
		$('.absolute-wrapper').removeClass('slide-in');

	});
});

 /**********************************************************************************************
  *
  * Offer form validation
  *
 ************************************************************************************************/
/*$("#contactForm").validator().on("submit", function (event) {
	if (event.preventDefault()) {
		// handle the invalid form...
		formError();
		submitMSG(false, "Did you fill in the form properly?");
	} else {
		// everything looks good!
		event.preventDefault();
		submitForm();
	}
});
/******************************************************************************
 *
 * offer form submission
 *
 ******************************************************************************/

/*function submitForm(){
	// Initiate Variables With Form Content
	var message = $("#message").val();

	$.ajax({
		type: "POST",
		url: "/public_html/lib/formphp/form-process.php",
		data: "message=" + message,
		success : function(text){
			if (text == "success"){
				formSuccess();
			} else {
				formError();
				submitMSG(false,text);
			}
		}
	});
}
/*****************************************************************************************************************
 *
 * function
 * form submission success message
 *
 ******************************************************************************************************************/
/*function formSuccess(){
	$("#contactForm")[0].reset();
	submitMSG(true, "Message Submitted!")
}
/****************************************************************************************************************
 *
 * offer form
 * error message
 *
 ***************************************************************************************************************/
/*function formError(){
	$("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		$(this).removeClass();
	});
}
/****************************************************************************************************************
 *
 *offer form
 * submission success message
 *
 * ****************************************************************************************************/

/*function submitMSG(valid, msg){
	if(valid){
		var msgClasses = "h3 text-center tada animated text-success";
	} else {
		var msgClasses = "h3 text-center text-danger";
	}
	$("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}


/****************************************************************************************************
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
		console.log("hi there derek");
		document.getElementById(menuItem[i]).style.display = "none";
	}
   console.log("helo there i got here")
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

