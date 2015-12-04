// open a new window with the form under scrutiny
module("tabs", {
	setup: function() {
		F.open("../../javascript/jquery/");
	}
});

// global variables for form values



var INVALID_EMAIL             = "super@jl.com";
var INVALID_PASSWORD          = "1212121";

var VALID_EMAIL             = "supergirl@jl.com";
var VALID_PASSWORD          = "7777777";



/**
 * test filling in only valid form data
 **/
function testValidFields() {
	// fill in the form values
	F("#email").type(VALID_EMAIL);
	F("#password").type(VALID_PASSWORD);

	// click the button once all the fields are filled in
	F("#login-submit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert").visible(function() {
		// create a regular expression that evaluates the successful text
		var successRegex = /Welcome Back/;

		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert-info"), "successful alert for login form");
		ok(successRegex.test(F(this).html()), "we have a successful login of a member");
	});
}

/**
 * test filling in invalid form data
 **/
function testInvalidFields() {
	// fill in the form values

	F("#email").type(INVALID_EMAIL);
	F("#password").type(INVALID_PASSWORD);


	// click the button once all the fields are filled in
	F("#login-submit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert").visible(function() {
		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert-danger"), "something went wrong");
		ok(F(this).html().indexOf("Exception: ") === 0, "invalid test - not successful");
	});
}

// the test function *MUST* be called in order for the test to execute
test("test valid fields", testValidFields);
test("test invalid fields", testInvalidFields);