
$(document).ready(function(){	
	var first = 0;
	var speed = 700;
	var pause = 3500;
	
		function removeFirst(){
			first = $('ul#sekilasinfo li:first').html();
			$('ul#sekilasinfo li:first')
			.animate({opacity: 0}, speed)
			.fadeOut('slow', function() {$(this).remove();});
			addLast(first);
		}
		
		function addLast(first){
			last = '<li style="display:none">'+first+'</li>';
			$('ul#sekilasinfo').append(last)
			$('ul#sekilasinfo li:last')
			.animate({opacity: 1}, speed)
			.fadeIn('slow')
		}
	
	interval = setInterval(removeFirst, pause);
});
