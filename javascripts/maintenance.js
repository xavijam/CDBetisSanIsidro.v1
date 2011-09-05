	var direction = 'bottom';
	var position = 0;
	
		$(document).ready(function() {
			setInterval(function(){
				if (direction=="bottom") {
					$('div.logo').css('background-position','0 '+(position-173)+'px');
					position = position - 173;
					if (position == -3287) {
						direction = "top";
					}
				} else {
					$('div.logo').css('background-position','0 '+(position+173)+'px');
					position = position + 173;
					if (position == 0) {
						direction = "bottom";
					}
				}
			},100);
		});