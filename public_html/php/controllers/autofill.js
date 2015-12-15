

$(document).ready (autofill);


function autofill() {

	$.ajax({
		type: "POST",
		url: 'php/controllers/autofill-edit-profile.php',
		dataType: "json",
		headers: {"X-XSRF-TOKEN": Cookies.get("XSRF-TOKEN")},
		success: function(msg) {
			var availableTags = msg;
			$("#blurb").val(availableTags["blurb"]);
			$("#firstName").val(availableTags["firstName"]);
			$("#lastName").val(availableTags["lastName"]);
			$("#userName").val(availableTags["userName"]);
			$("#email").val(availableTags["email"]);
			$("#profile-blurb").html(availableTags["blurb"]);
			$("#image-footer-username").html(availableTags["userName"]);
		}
	});

	$.ajax({
		type: "GET",
		url: "php/controllers/message-recieved-retrieval.php",
		success: function(messages) {
			$("#message").html(messages);
		}
	});
}





