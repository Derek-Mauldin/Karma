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
var INVALID_USERNAME    = "Joker";
var INVALID_FIRSTNAME = "evan";
var INVALID_LASTNAME =  "smith";
var INVALID_EMAIL = "superman@jl.com";
var INVALID_BLURB = "lfkjhsdzfhgSJHFbzskd";

var VALID_USERNAME      = "superman";
var VALID_FIRSTNAME   = "Clark";
var VALID_LASTNAME = "Kent";
var VALID_EMAIL = "superman@jl.com"
var VALID_BLURB = "asdfghjklzxcvbnm"
/**
 * test filling in only valid form data
 **/
function testValidFields() {
	// fill in the form values
	F("#userName").type(VALID_USERNAME);
	F("#firstName").type(VALID_FIRSTNAME);
	F("#lastName").type(VALID_LASTNAME);
	F("#email").type(VALID_EMAIL);
	F("#blurb").type(VALID_BLURB);

	// click the button once all the fields are filled in
	F("#submit-profile").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-success").visible(function() {
		// create a regular expression that evaluates the successful text
		var successRegex = /Profile Successfully Updated./;

		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert-info"), "successful alert CSS");
		ok(successRegex.test(F(this).html()), "successful message");
	});
}

/**
 * test filling in invalid form data
 **/
function testInvalidFields() {
	// fill in the form values
	F("#userName").type(INVALID_USERNAME);
	F("#firstName").type(INVALID_FIRSTNAME);
	F("#lastName").type(INVALID_LASTNAME);
	F("#email").type(INVALID_EMAIL);
	F("#blurb").type(INVALID_BLURB);

	// click the button once all the fields are filled in
	F("#submit-profile").click();

	// in forms, we want to assert the form worked as expected
	// here, we assert we got the success message from the AJAX call
	F(".alert-danger").visible(function() {
		// the ok() function from qunit is equivalent to SimpleTest's assertTrue()
		ok(F(this).hasClass("alert-danger"), "danger alert CSS");
		ok(F(this).html().indexOf("Exception: unable to execute mySQL statement") === 0, "unsuccessful message");
	});
}

// the test function *MUST* be called in order for the test to execute
test("test valid fields", testValidFields);
test("test invalid fields", testInvalidFields);