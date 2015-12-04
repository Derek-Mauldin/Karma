// open a new window with the form under scrutiny
module("tabs", {
	setup: function() {
		F.open("../../javascript/jquery/");
	}
});

// global variables for form values

var INVALID_FIRST_NAME        = "K";
var INVALID_LAST_NAME         = "Z";
var INVALID_USER_NAME         = "flash";
var INVALID_EMAIL             = "superman@jl.com";
var INVALID_PASSWORD          = "5555555";
var INVALID_CONFIRM_PASSWORD  ="6666666";

var VALID_FIRST_NAME        = "Kara";
var VALID_LAST_NAME         = "Zor El";
var VALID_USER_NAME         = "supergirl";
var VALID_EMAIL             = "supergirl@jl.com";
var VALID_PASSWORD          = "7777777";
var VALID_CONFIRM_PASSWORD  = "7777777";


/**
 * test filling in only valid form data
 **/
function testValidFields() {
	// fill in the form values
	F("#firstName").type(VALID_FIRST_NAME);
	F("#lastName").type(VALID_LAST_NAME);
	F("#userName").type(VALID_USER_NAME);
	F("#email").type(VALID_EMAIL);
	F("#password").type(VALID_PASSWORD);
	F("#confirmPassword").type(VALID_CONFIRM_PASSWORD);



	// click the button once all the fields are filled in
	F("#register-submit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert").visible(function() {
		// create a regular expression that evaluates the successful text
		var successRegex = /Successful Insertion of new member/;

		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert-info"), "successful alert for register form");
		ok(successRegex.test(F(this).html()), "we have a successful insert of a new member");
	});
}

/**
 * test filling in invalid form data
 **/
function testInvalidFields() {
	// fill in the form values
	F("#firstName").type(INVALID_FIRST_NAME);
	F("#lastName").type(INVALID_LAST_NAME);
	F("#userName").type(INVALID_USER_NAME);
	F("#email").type(INVALID_EMAIL);
	F("#password").type(INVALID_PASSWORD);
	F("#confirmPassword").type(INVALID_CONFIRM_PASSWORD);

	// click the button once all the fields are filled in
	F("#register-submit").click();

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