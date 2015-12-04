// open a new window with the form under scrutiny
module("tabs", {
	setup: function() {
		F.open("../../public_html/php/forms/message-form.php");
	}
});

// global variables for form values
var INVALID_SENDER    = "sombody";
var INVALID_RECEIVER = "nobody";
var INVALID_MESSAGE= "message from somebody to nobody";
var VALID_SENDER     = "superman";
var VALID_RECEIVER   = "batman";
var VALID_MESSAGE   = "message from batman to superman";

/**
 * test filling in only valid form data
 **/
function testValidFields() {
	// fill in the form values
	F("#messageSender").type(VALID_SENDER);
	F("#messageReceiver").type(VALID_RECEIVER);
	F("#kMessage").type(VALID_MESSAGE);

	// click the button once all the fields are filled in
	F("#messageSubmit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-info").visible(function() {
		// create a regular expression that evaluates the successful text
		var successRegex = /Successful Insertion of new message/;


		//comment


		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert alert-info"), "successful insert of a message");
		ok(successRegex.test(F(this).html()), "funcUnit success");

	});
}

/**
 * test filling in invalid form data
 **/
function testInvalidFields() {
	// fill in the form values
	F("#messageSender").type(INVALID_SENDER);
	F("#messageReceiver").type(INVALID_RECEIVER);
	F("#kMessage").type(INVALID_MESSAGE);

	// click the button once all the fields are filled in
	F("#messageSubmit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-danger").visible(function() {
		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert alert-danger"), "unsuccessful message insert");
		ok(F(this).html().indexOf("Exception: ") === 0,"unsuccessful message");
	});
}

// the test function *MUST* be called in order for the test to execute
test("test valid fields", testValidFields);
test("test invalid fields", testInvalidFields);