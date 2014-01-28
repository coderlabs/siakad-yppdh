var timer=null;
function openContent(trigger,divID){
	$('#slideshow a').each(
		function(){
			$(this).css({'background-color':'#7EAD01','color':'#FFF'});
		}
	);
	$('#slideContent div').hide();
	$('#'+divID).fadeIn('slow');
	$(trigger).css({'background-color':'#FC0','color':'#000'});
	if(timer != null) clearTimeout(timer);
	timer=setTimeout(
		function(){
			var nextAnchor=($(trigger).next('a').text() == '') ? $('#slideshow a:first') : $(trigger).next('a');
			nextAnchor.click();
		}, 5000
	);
}