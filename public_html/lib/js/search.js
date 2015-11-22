$(function() {
	var $searchlink = $('#searchlink');

	/*hover effect*/
	$searchlink.on('mouseover', function(){
		$(this).addClass('open');
	}).on('mouseout', function(){
		$(this).removeClass('open');
	});

	/** on click effect
	 $searchlink.on('click', function(e){
    var target = e ? e.target : window.event.srcElement;

    if($(target).attr('id') == 'searchlink') {
      if($(this).hasClass('open')) {
        $(this).removeClass('open');
      } else {
        $(this).addClass('open');
      }
    }
  });*/
});