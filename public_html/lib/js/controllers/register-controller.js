// document ready event
$(document).ready(


	// inner function for the ready() event
	function() {

		// tell the validator to validate this form
		$("#sign-up-form").validate({
		debug: true,
		// setup the formatting for the errors
		errorClass: "has-error",
		errorLabelContainer: "#outputArea",
		wrapper: "li",

		// rules define what is good/bad input
		rules: {

		// each rule starts with the inputs name (NOT id)
		firstName: {
		minlength: 2,
		required: true
		},

		lastName: {
			minlength: 2,
			required: true
		},

		userName: {
			minlength: 5,
			required: true
		},

		email: {
			required: true,
			email: true
		},

		password: {
		minlength: 7,
		required: true
		},

		verifyPassword: {
		equalTo: "#password",
		required: true
		}


		},

		// error messages to display to the end user
		messages: {

		firstName: {
		minlength: "enter at least two characters",
		required: "must enter a valid first name"
		},

		lastName: {
			minlength: "enter at least two characters",
			required: "must enter a valid last name"
		},

		userName: {
			minlength: "enter at least five characters",
			required: "must enter a valid user name"

		},

		email: {
			required: "must enter email address",
			email: "please enter valid email"
		},

		password: {
		minlength: "please enter 7 characters",
		required: "please enter valid password"
		},

		verifyPassword: {
		equalTo: "passwords do not match",
		required: "password do not match"
		}

		},

		// setup an AJAX call to submit the form without reloading
		submitHandler: function(form) {
		$("#register-form").ajaxSubmit({
		// GET or POST
		type: "POST",
		// where to submit data
		url: $("#register-form").attr("action"),
		// this sends the XSRF token along with the form data
		headers: {
		"X-XSRF-TOKEN": Cookies.get("XSRF-TOKEN")
		},
		// success is an event that happens when the server replies
		success: function(ajaxOutput) {
		// clear the output area's formatting
		$("#outputArea").css("display", "");
		// write the server's reply to the output area
		$("#outputArea").html(ajaxOutput);


		// reset the form if it was successful
		// this makes it easier to reuse the form again
		if($(".alert-success").length > 0) {
		$("#register-form")[0].reset();

		//refresh page on successful login
		setTimeout(function() {location.reload(true);}, 1000);
		}
		}
		});
		$("#register-submit").click(function() {
		// $("#sign-up-form").modal("hide");
		});
		}
		});
	});