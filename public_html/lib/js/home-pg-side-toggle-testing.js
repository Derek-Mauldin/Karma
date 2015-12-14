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



function closeNeed() {

	console.log("in closeNeed");

	if (document.getElementById("soccer").style.display === "none") {
		document.getElementById("soccer").style.display = "block";
	}
	else {
		document.getElementById("soccer").style.display = "none";
	}
}

/**********************************************
 *
 * registration complete announcment div on main page,
 * click x to hide
 *
 * ****************************************************/

$("#hide").click(function(){
	$("#resistration-complete").hide();
});