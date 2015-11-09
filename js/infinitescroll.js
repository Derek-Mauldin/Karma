$(function() {
	$(document).endlessScroll({
		bottomPixels: 500,
		fireDelay: 10,
		callback: function(i) {
			var last_img = $("ul#images li:last");
			last_img.after(last_img.prev().prev().prev().prev().prev().prev().clone());
		}
	});
});
(function(){
	var bsa = document.createElement('script');
	bsa.type = 'text/javascript';
	bsa.async = true;
	bsa.src = 'http://s3.buysellads.com/ac/bsa.js';
	(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);
})();

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-44788261-1']);
_gaq.push(['_trackPageview']);

(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
