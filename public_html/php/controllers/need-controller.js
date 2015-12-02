// document ready event
$(document).ready(
	// inner function for the ready() event
	function() {

		// tell the validator to validate this form
		$("#need-form").validate({
			debug: true,
			// setup the formatting for the errors
			errorClass: "alert alert-danger",
			errorLabelContainer: "#needError",
			wrapper: "li",

			// rules define what is good/bad input
			rules: {
				// each rule starts with the inputs name (NOT id)
				username: {
					minlength: 5,
					required: true
				},

				needTitle: {
					minlength: 5,
					required: true
				},

				needDescription: {
					minlength: 10,
					maxlength: 500,
					required: true
				}
			},


			// error messages to display to the end user
			messages: {

				username: {
					minlength: "username must be at least five characters ",
					required: "must enter username"
				},

				needTitle: {
					minlength: "Need Title must be at least 5 characters",
					required: "must enter a need title"
				},

				needDescription: {
					minlength: "message must be at least ten characters",
					maxlength: "message can not exceed five hundred character",
					required: "must enter a message"
				}
			},


			// setup an AJAX call to submit the form without reloading
			submitHandler: function(form) {
				$("#need-form").ajaxSubmit({
					// GET or POST
					type: "POST",
					// where to submit data
					url: $("#need-form").attr("action"),
					// this sends the XSRF token along with the form data
					headers: {
						"X-XSRF-TOKEN": Cookies.get("XSRF-TOKEN")
					},
					// success is an event that happens when the server replies
					success: function(ajaxOutput) {
						// clear the output area's formatting
						$("#needError").css("display", "");
						// write the server's reply to the output area
						$("#needError").html(ajaxOutput);


						// reset the form if it was successful
						// this makes it easier to reuse the form again
						if($(".alert-success").length > 0) {
							$("#need-form")[0].reset();

							//refresh page on successful login
							setTimeout(function() {location.reload(true);}, 1000);
						}
					}
				});

				$("#needSubmit").click(function() {

				});
			}
		});
	});