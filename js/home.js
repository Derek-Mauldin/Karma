new Request.HTML({
	url: '/echo/html/',
	data: {
		html: "<p>Text echoed back to request</p>" + "<script type='text/javascript'>$('target').highlight();<\/script>",
		delay: 3
	},
	method: 'post',
	update: 'target'
}).send();

new Request.JSON({
	url: '/echo/json/',
	data: {
		json: JSON.encode({
			text: 'some text',
			array: [1, 2, 'three'],
			object: {
				par1: 'another text',
				par2: [3, 2, 'one'],
				par3: {}

$(d$(document).ready(function () {
	var divs = $('.mydivs>div');
	var now = 0; // currently shown div
	divs.hide().first().show();
	$("button[name=next]").click(function (e) {
		divs.eq(now).hide();
		now = (now + 1 < divs.length) ? now + 1 : 0;
		divs.eq(now).show(); // show next
	});
	$("button[name=prev]").click(function (e) {
		divs.eq(now).hide();
		now = (now > 0) ? now - 1 : divs.length - 1;
		divs.eq(now).show(); // or .css('display','block');
		//console.log(divs.length, now);
	});
})
);
