// open a new window with the form under scrutiny
module("tabs", {
	setup: function() {
		F.open("../../javascript/jquery/");
	}
});

// global variables for form values
var INVALID_PROFILEID    = "2";
var INVALID_TWEETCONTENT = "FuncUnit tests fail!";
var VALID_PROFILEID      = "1";
var VALID_TWEETCONTENT   = "FuncUnit tests work!";

/**
 * test filling in only valid form data
 **/
function testValidFields() {
	// fill in the form values
	F("#profileId").type(VALID_PROFILEID);
	F("#tweetContent").type(VALID_TWEETCONTENT);

	// click the button once all the fields are filled in
	F("#tweetSubmit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert").visible(function() {
		// create a regular expression that evaluates the successful text
		var successRegex = /Tweet \(id = \d+\) posted!/;

		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert-success"), "successful alert CSS");
		ok(successRegex.test(F(this).html()), "successful message");
	});
}

/**
 * test filling in invalid form data
 **/
function testInvalidFields() {
	// fill in the form values
	F("#profileId").type(INVALID_PROFILEID);
	F("#tweetContent").type(INVALID_TWEETCONTENT);

	// click the button once all the fields are filled in
	F("#tweetSubmit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert").visible(function() {
		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert-danger"), "danger alert CSS");
		ok(F(this).html().indexOf("Exception: unable to execute mySQL statement") === 0, "unsuccessful message");
	});
}

// the test function *MUST* be called in order for the test to execute
test("test valid fields", testValidFields);
test("test invalid fields", testInvalidFields);