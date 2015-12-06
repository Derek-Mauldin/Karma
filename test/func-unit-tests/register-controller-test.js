// open a new window with the form under scrutiny
module("tabs", {
	setup: function() {
		F.open("../../public_html/php/forms/register-form.php");
	}
});

// global variables for form values

var TEST_FIRST_NAME        = "Barry";
var TEST_LAST_NAME         = "Allan";
var TEST_PASSWORD          = "7777777"
var TEST_PASSWORD_CONFIRM  = "7777777"

var INVALID_USER_NAME      = "supergirl";
var INVALID_EMAIL          = "superman@jl.com";

var VALID_USER_NAME         = "flash";
var VALID_USER_NAME2        = "the flash"
var VALID_EMAIL             = "flash@jl.com";



/**
 * test register with valid form data
 **/
function testValidFields() {
	// fill in the form values
	F("#firstName").type(TEST_FIRST_NAME);
	F("#lastName").type(TEST_LAST_NAME);
	F("#userName").type(VALID_USER_NAME);
	F("#email").type(VALID_EMAIL);
	F("#password").type(TEST_PASSWORD);
	F("#confirmPassword").type(TEST_PASSWORD_CONFIRM);



	// click the button once all the fields are filled in
	F("#register-submit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-info").visible(function() {
		// create a regular expression that evaluates the successful text
		var successRegex = /Successful Insertion of new member\./gmi;

		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert alert-info"), "Alert Info");
		ok(successRegex.test(F(this).html()), F(this).html().valueOf('#registerError'));
	});
}

/**
 * test register with invalid user name - one that is already being used
 **/
function testInvalidUserName() {
	// fill in the form values
	F("#firstName").type(TEST_FIRST_NAME);
	F("#lastName").type(TEST_LAST_NAME);
	F("#userName").type(INVALID_USER_NAME);
	F("#email").type(VALID_EMAIL);
	F("#password").type(TEST_PASSWORD);
	F("#confirmPassword").type(TEST_PASSWORD_CONFIRM);

	// click the button once all the fields are filled in
	F("#register-submit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-danger").visible(function() {
		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert alert-danger"), "Alert Danger");
		ok(F(this).html().indexOf("Exception: ") === 0, F(this).html().valueOf('#registerError'));
	});
}


/**
 * test register with invalid email - one that is already being used
 **/
function testInvalidEmail() {
	// fill in the form values
	F("#firstName").type(TEST_FIRST_NAME);
	F("#lastName").type(TEST_LAST_NAME);
	F("#userName").type(VALID_USER_NAME2);
	F("#email").type(INVALID_EMAIL);
	F("#password").type(TEST_PASSWORD);
	F("#confirmPassword").type(TEST_PASSWORD_CONFIRM);

	// click the button once all the fields are filled in
	F("#register-submit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-danger").visible(function() {
		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert alert-danger"), "Alert Danger");
		ok(F(this).html().indexOf("Exception: ") === 0, F(this).html().valueOf('#registerError'));
	});
}

// the test function *MUST* be called in order for the test to execute
test("test valid fields", testValidFields);
test("test register with invalid user name", testInvalidUserName);
test("test register with invalid email", testInvalidEmail);