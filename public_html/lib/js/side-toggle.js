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

		function showonlyone(thechosenone) {
			$('.newboxes').each(function(index) {
				if ($(this).attr("id") == thechosenone) {
					$(this).show(200);
				}
				else {
					$(this).hide(600);
				}
			});
		}



