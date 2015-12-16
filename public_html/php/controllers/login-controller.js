// document ready event
$(document).ready(

	// inner function for the ready() event
	function() {

		// tell the validator to validate this form
		$("#login-form").validate({
			debug: true,
			// setup the formatting for the errors
			errorClass: "alert alert-danger",
			errorLabelContainer: "#loginError",
			wrapper: "li",

			// rules define what is good/bad input
			rules: {

				// each rule starts with the inputs name (NOT id)
				logInEmail: {
					required: true,
					email: true
				},

				logInPassword: {
					minlength: 7,
					required: true
				}
			},

			// error messages to display to the end user
			messages: {

				logInEmail: {
					required: "must enter email address",
					email: "please enter your valid email address"

				},

				logInPassword: {
					minlength: "please enter 7 characters",
					required: "please enter valid password"
				}
			},


			// setup an AJAX call to submit the form without reloading
			submitHandler: function(form) {

				$("#login-form").ajaxSubmit({
					// GET or POST
					type: "POST",
					// where to submit data
					url: $("#login-form").attr("action"),
					// this sends the XSRF token along with the form data
					headers: {
						"X-XSRF-TOKEN": Cookies.get("XSRF-TOKEN")
					},
					// success is an event that happens when the server replies
					success: function(ajaxOutput) {

						// clear the output area's formatting
						if(ajaxOutput.length > 0) {
							$("#loginError").css("display", "");
							// write the server's reply to the output area
							$("#loginError").html(ajaxOutput);
						} else {
							window.location = "home.php";
							$("#profile-page").hide();
							$("#message-page").hide();
							$("#feed-page").hide();
							$("#home-page").show();
						}

					}
				});
			}
		});
	});