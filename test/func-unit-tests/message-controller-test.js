// open a new window with the form under scrutiny
module("tabs", {
	setup: function() {
		F.open("../../public_html/php/forms/message-form.php");
	}
});

// global variables for form values
var INVALID_MESSAGESENDER    = "7";
var INVALID_MESSEGERECEIVER = "8";
var INVALID_KARMAMESSAGE = "message";

var VALID_MESSAGESENDER = "1";
var VALID_MESSAGERECEIVER = "2";
var VALID_KARMAMESSAGE = "message sent to superman";

/**
 * test filling in only valid form data
 **/
function testValidFields() {
	// fill in the form values
	F("#messageSender").type(VALID_MESSAGESENDER);
	F("#messageReceiver").type(VALID_MESSAGERECEIVER);
	F("#karmaMessage").type(VALID_KARMAMESSAGE);

	// click the button once all the fields are filled in
	F("#message-submit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-info").visible(function() {
		// create a regular expression that evaluates the successful text
		var successRegex = /Successful Insertion of new message/;

		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert-success"), "successful alert for message insert");
		ok(successRegex.test(F(this).html()), "message has been successfully sent");
	});
}

/**
 * test filling in invalid form data
 **/
function testInvalidFields() {
	// fill in the form values
	F("#messageSender").type(INVALID_MESSAGESENDER);
	F("#messageReceiver").type(INVALID_MESSEGERECEIVER);
	F("#karmaMessage").type(INVALID_KARMAMESSAGE);

	// click the button once all the fields are filled in
	F("#message-submit").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-danger").visible(function() {

		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert-danger"), "unsuccesful message insert");
		ok(F(this).html().indexOf("Exception: ") === 0, "unsuccesful message insert");
	});
}

// the test function *MUST* be called in order for the test to execute
test("test valid fields", testValidFields);
test("test invalid fields", testInvalidFields);