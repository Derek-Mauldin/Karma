/**
 * Created by Evan on 11/30/2015.
 */
// document ready event


$(document).ready(


	// inner function for the ready() event
	function() {


		// tell the validator to validate this form
		$("#edit-user-form").validate({
			debug: true,
			// setup the formatting for the errors
			errorClass: "alert alert-danger",
			errorLabelContainer: "#editUserError",
			wrapper: "li",

			// rules define what is good/bad input
			rules: {

				// each rule starts with the inputs name (NOT id)
				blurb: {
					maxlength: 500,
					required: false
				},

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
					required: false
				},

				newPassword: {
					minlength: 7,
					required: false
				},

				confirmPassword: {
					equalTo: "#newPassword",
					required: false
				}
			},

			// error messages to display to the end user
			messages: {

				profileBlurb: {
					maxlength: "Blurb can not be more than 500 characters"
				},

				firstName: {
					minlength: "enter at least two characters",
					required: "please enter a valid first name"
				},

				lastName: {
					minlength: "enter at least two characters",
					required: "please enter a valid last name"
				},

				userName: {
					minlength: "enter at least five characters",
					required: "please enter a valid user name"
				},

				email: {
					required: "must enter email address",
					email: "please enter  a valid email address"
				},

				password: {
					minlength: "please enter 7 characters"
				},

				newPassword: {
					minlength: "please enter 7 characters"
				},

				confirmPassword: {
					equalTo: "new passwords do not match"
				}

			},

			// setup an AJAX call to submit the form without reloading
			submitHandler: function(form) {
				$("#edit-user-form").ajaxSubmit({
					// GET or POST
					type: "POST",
					// where to submit data
					url: $("#edit-user-form").attr("action"),
					// this sends the XSRF token along with the form data
					headers: {
						"X-XSRF-TOKEN": Cookies.get("XSRF-TOKEN")
					},
					// success is an event that happens when the server replies
					success: function(ajaxOutput) {
						// clear the output area's formatting
						$("#editUserError").css("display", "");
						// write the server's reply to the output area
						$("#editUserError").html(ajaxOutput);

					}
				});
				$("#submit-profile").click(function() {
				});
			}
		});
	});
