// open a new window with the form under scrutiny
module("tabs", {
	setup: function() {
		F.open("../../public_html/php/forms/register-form.php");
	}
});

// global variables for form values


var VALID_EMAIL             = "supergirl@jl.com";
var VALID_PASSWORD          = "7777777";



/**
 * test filling in only valid form data
 **/
function testValidFields() {
	// fill in the form values
	F("#logInEmail").type(VALID_EMAIL);
	F("#logInPassword").type(VALID_PASSWORD);

	// click the button once all the fields are filled in
	F("#login-submit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-info").visible(function() {
		// create a regular expression that evaluates the successful text
		F("#clickHome").click();

	//	var successRegex = /Welcome Back/;

		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
	//	ok(F(this).hasClass("alert alert-info"), "Alert Info");
	//	ok(successRegex.test(F(this).html()), F(this).html().valueOf('#loginError'));
	})
		.then(function() {
			F("#logout").visible(function () {
				F(this).click();
		//		ok(F(this).hasClass("alert alert-info"), "Alert Info");
				ok(F("p:contains('You are now Logged Out')"), "Logout Message Displayed");
			});
		});
}



// the test function *MUST* be called in order for the test to execute
test("test valid fields", testValidFields);
