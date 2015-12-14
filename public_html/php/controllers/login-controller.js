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
						window.location = "https://bootcamp-coders.cnm.edu/~dmauldin2/karma/public_html/index.php";
						// clear the output area's formatting
						$("#loginError").css("display", "");
						// write the server's reply to the output area
						$("#loginError").html(ajaxOutput);
						setTimeout()
					}
				});

				$("#login-submit").click(function() {
				});
			}
		});
	});