// open a new window with the form under scrutiny
module("tabs", {
	setup: function() {
		F.open("../../javascript/jquery/");
	}
});

// global variables for form values
var INVALID_SENDER    = "sad";
var INVALID_RECEIVER = "cat!";
var INVALID_MESSAGE = "dog";
var VALID_SENDER     = "superman";
var VALID_RECEIVER   = "Monkey needs banana!";
var VALID_MESSAGE   = "Monkey needs banana NOWWW!!";

/**
 * test filling in only valid form data
 **/
function testValidFields() {
	// fill in the form values
	F("#messageSender").type(VALID_USERNAME);
	F("#messageReceiver").type(VALID_NEEDTITLE);
	F("#karmaMessage").type(VALID_NEEDDESCRIPTION);

	// click the button once all the fields are filled in
	F("#needSubmit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert").visible(function() {
		// create a regular expression that evaluates the successful text
		var successRegex = /Successful Insertion of new message/;
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
	F("#messageSender").type(INVALID_USERNAME);
	F("#needTitle").type(INVALID_NEEDTITLE);
	F("#karmaMessage").type(INVALID_NEEDDESCRIPTION);

	// click the button once all the fields are filled in
	F("#needSubmit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-danger").visible(function() {
		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert-danger"), "danger alert");
		ok(F(this).html().indexOf("Exception: ") === 0,"unsuccessful message");
	});
}

// the test function *MUST* be called in order for the test to execute
test("test valid fields", testValidFields);
test("test invalid fields", testInvalidFields);