// open a new window with the form under scrutiny
module("tabs", {
	setup: function() {
		F.open("../../javascript/jquery/");
	}
});

// global variables for form values
var INVALID_USERNAME    = "sad";
var INVALID_NEEDTITLE = "cat!";
var INVALID_NEEDDESCRIPTION = "dog";
var VALID_USERNAME     = "superman";
var VALID_NEEDTITLE   = "Monkey needs banana!";
var VALID_NEEDDESCRIPTION   = "Monkey needs banana NOWWW!!";

/**
 * test filling in only valid form data
 **/
function testValidFields() {
	// fill in the form values
	F("#username").type(VALID_USERNAME);
	F("#needTitle").type(VALID_NEEDTITLE);
	F("#needDescription").type(VALID_NEEDDESCRIPTION);

	// click the button once all the fields are filled in
	F("#needSubmit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert").visible(function() {
		// create a regular expression that evaluates the successful text
		var successRegex = /Successful need insertion/;
		//var successMessage = "Successful need insertion";

		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert-info"), "successful alert CSS");
		ok(successRegex.test(F(this).html()), "successful message");
		//ok("Successful need insertion", "success");
	});
}

/**
 * test filling in invalid form data
 **/
function testInvalidFields() {
	// fill in the form values
	F("#username").type(INVALID_USERNAME);
	F("#needTitle").type(INVALID_NEEDTITLE);
	F("#needDescription").type(INVALID_NEEDDESCRIPTION);

	// click the button once all the fields are filled in
	F("#needSubmit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert").visible(function() {
		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert-danger"), "danger alert");
		ok(F(this).html().indexOf("Exception: ") === 0,"unsuccessful message");
	});
}

// the test function *MUST* be called in order for the test to execute
test("test valid fields", testValidFields);
test("test invalid fields", testInvalidFields);