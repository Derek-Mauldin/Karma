function HideContent(d) {
	document.getElementById(d).style.display = "none";
}
function ShowContent(d) {
	document.getElementById(d).style.display = "block";
}


function ReverseDisplay(d) {
	if(document.getElementById(d).style.display == "none") { document.getElementById(d).style.display = "block"; }
	else { document.getElementById(d).style.display = "none"; }
}


$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});


function HideAllShowOne(d) {

	var menuItem = ["home-page", "profile-page", "message-page", "feed-page"];

	for(i = 0; i < menuItem.length; i++) {
		document.getElementById(menuItem[i]).style.display = "none";
	}

	if(d === 'hp') {
		document.getElementById(menuItem[0]).style.display = "inline block";
	} else if(d === 'pp') {
		document.getElementById(menuItem[1]).style.display = "inline block";
	} else if(d === 'mp') {
		document.getElementById(menuItem[2]).style.display = "inline block";
	} else if(d === 'fp') {
		document.getElementById(menuItem[3]).style.display = "inline block";
	}

}

function closeNeed() {

	console.log("in closeNeed");

	if (document.getElementById("soccer").style.display === "none") {
		document.getElementById("soccer").style.display = "block";
	}
	else {
		document.getElementById("soccer").style.display = "none";
	}
}