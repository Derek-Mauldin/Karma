// open a new window with the form under scrutiny
module("tabs", {
	setup: function() {
		F.open("../../public_html/php/forms/need-form.php");
	}
});

// global variables for form values
var INVALID_USERNAME    = "jennifer";
var VALID_USERNAME     = "superman";

var TEST_NEEDTITLE   = "Monkey needs banana!";
var TEST_NEEDDESCRIPTION   = "Monkey needs banana NOWWW!!";

/**
 * test submitting need with valid user name
 **/
function testValidUserName() {
	// fill in the form values
	F("#username").type(VALID_USERNAME);
	F("#needTitle").type(TEST_NEEDTITLE);
	F("#needDescription").type(TEST_NEEDDESCRIPTION);

	// click the button once all the fields are filled in
	F("#needSubmit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-info").visible(function() {
		// create a regular expression that evaluates the successful text
		var successRegex = /Succesful need insertion/;


		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert alert-info"), "Info Alert");
		ok(successRegex.test(F(this).html()), F(this).html().valueOf('#needError'));

	});
}

/**
 * test submitting need with invalid user name
 **/
function testInvalidUserName() {
	// fill in the form values
	F("#username").type(INVALID_USERNAME);
	F("#needTitle").type(TEST_NEEDTITLE);
	F("#needDescription").type(TEST_NEEDDESCRIPTION);

	// click the button once all the fields are filled in
	F("#needSubmit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-danger").visible(function() {
		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert alert-danger"), "Danger Alert");
		ok(F(this).html().indexOf("Exception: ") === 0, F(this).html().valueOf('#needError'));
	});
}

// the test function *MUST* be called in order for the test to execute
test("test inserting need with valid user name", testValidUserName);
test("test invalid need with invalid user name", testInvalidUserName);

//commenting again