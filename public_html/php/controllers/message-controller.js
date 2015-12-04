// document ready event
$(document).ready(
	// inner function for the ready() event
	function() {

		// tell the validator to validate this form
		$("#karmaMessage").validate({
			debug: true,
			// setup the formatting for the errors
			errorClass: "alert alert-danger",
			errorLabelContainer: "#mError",
			wrapper: "li",

			// rules define what is good/bad input
			rules: {
				// each rule starts with the inputs name (NOT id)
				messageSender: {
					minlength: 5,
					required: true
				},

				messageReceiver: {
					minlength: 5,
					required: true
				},

				karmaMessage: {
					maxlength: 500,
					required: true
				}
			},


			// error messages to display to the end user
			messages: {

				messageSender: {
					minlength: "username must be at least five characters ",
					required: "must enter sender username",
				},

				messageReceiver: {
					minlength: "username must be at least five characters",
					required: "must enter receiver name"
				},

				karmaMessage: {
					maxlength: "message can not exceed five hundred character",
					minlength: "message must be at least ten characters",
					required: "must enter a message"
				}
			},


			// setup an AJAX call to submit the form without reloading
			submitHandler: function(form) {
				$("#karmaMessage").ajaxSubmit({
					// GET or POST
					type: "POST",
					// where to submit data
					url: $("#karmaMessage").attr("action"),
					// this sends the XSRF token along with the form data
					headers: {
						"X-XSRF-TOKEN": Cookies.get("XSRF-TOKEN")
					},
					// success is an event that happens when the server replies
					success: function(ajaxOutput) {
						// clear the output area's formatting
						$("#mError").css("display", "");
						// write the server's reply to the output area
						$("#mError").html(ajaxOutput);


						// reset the form if it was successful
						// this makes it easier to reuse the form again
						if($(".alert-success").length > 0) {
							$("#karmaMessage")[0].reset();

							//refresh page on successful login
							setTimeout(function() {location.reload(true);}, 1000);
						}
					}
				});

				$("#submitButton").click(function() {

				});
			}
		});
	});