/**
 * Created by Evan on 12/3/2015.
 */
// open a new window with the form under scrutiny
module("tabs", {
	setup: function() {
		F.open("../../public_html/php/forms/edit-profile.php");
	}
});

// global variables for form values
var TEST_FIRSTNAME              = "Clark";
var TEST_LASTNAME               = "Kent";
var TEST_BLURB                  = "I am superman";
var TEST_NEW_PASSWORD           = "7777777";
var TEST_NEW_PASSWORD_CONFIRM   = "7777777";

var INVALID_USERNAME    = "batman";
var INVALID_EMAIL       = "batman@jl.com";
var INVALID_PASSWORD    = "1231234";

var VALID_USERNAME      = "superman";
var VALID_EMAIL         = "superman@jl.com";
var VALID_PASSWORD      = "7777777";

/**
 * test filling in only valid form data
 **/
function testValidFields() {
	// fill in the form values
	F("#userName").type(VALID_USERNAME);
	F("#firstName").type(TEST_FIRSTNAME);
	F("#lastName").type(TEST_LASTNAME);
	F("#email").type(VALID_EMAIL);
	F("#blurb").type(TEST_BLURB);
	F("#password").type(VALID_PASSWORD);
	F("#newPassword").type(TEST_NEW_PASSWORD);
	F("#confirmPassword").type(TEST_NEW_PASSWORD_CONFIRM);


	// click the button once all the fields are filled in
	F("#submit-profile").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-info").visible(function() {
		// create a regular expression that evaluates the successful text
		var successRegex = /Profile Successfully Updated./;

		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert alert-info"), "Alert Info");
		ok(successRegex.test(F(this).html()), F(this).html().valueOf('#editUserError'));
	});
}

/**
 * test updating profile with invalid user name
 **/
function testInvalidUserName() {
	// fill in the form values
	F("#userName").type(INVALID_USERNAME);
	F("#firstName").type(TEST_FIRSTNAME);
	F("#lastName").type(TEST_LASTNAME);
	F("#email").type(VALID_EMAIL);
	F("#blurb").type(TEST_BLURB);

	// click the button once all the fields are filled in
	F("#submit-profile").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-danger").visible(function() {
		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert alert-danger"), "Alert Danger");
		ok(F(this).html().indexOf("Exception: ") === 0, F(this).html().valueOf('#editUserError'));
	});
}

/**
 * test updating profile with invalid user name
 **/
function testInvalidEmail() {
	// fill in the form values
	F("#userName").type(VALID_USERNAME);
	F("#firstName").type(TEST_FIRSTNAME);
	F("#lastName").type(TEST_LASTNAME);
	F("#email").type(INVALID_EMAIL);
	F("#blurb").type(TEST_BLURB);

	// click the button once all the fields are filled in
	F("#submit-profile").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-danger").visible(function() {
		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert alert-danger"), "Alert Danger");
		ok(F(this).html().indexOf("Exception: ") === 0, F(this).html().valueOf('#editUserError'));
	});
}


/**
 * test updating password with invalid current password
 **/
function testInvalidPassword() {
	// fill in the form values
	F("#userName").type(VALID_USERNAME);
	F("#firstName").type(TEST_FIRSTNAME);
	F("#lastName").type(TEST_LASTNAME);
	F("#email").type(VALID_EMAIL);
	F("#blurb").type(TEST_BLURB);
	F("#password").type(INVALID_PASSWORD);
	F("#newPassword").type(TEST_NEW_PASSWORD);
	F("#confirmPassword").type(TEST_NEW_PASSWORD_CONFIRM);

	// click the button once all the fields are filled in
	F("#submit-profile").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-danger").visible(function() {
		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert alert-danger"), "Alert Danger");
		ok(F(this).html().indexOf("Exception: ") === 0, F(this).html().valueOf('#editUserError'));
	});
}


// the test function *MUST* be called in order for the test to execute
test("test valid fields", testValidFields);
test("test updating with invalid user name", testInvalidUserName);
test("test updating with an invaild email address", testInvalidEmail);
test("test updating password with invalid current password", testInvalidPassword);