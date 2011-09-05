	var map;
	var position;
		
		$(document).ready(function() {
			position = new google.maps.LatLng($('#latitude').text(),$('#longitude').text());
			
			$("#slider").easySlider({auto: false, continuous: true, numeric: true});
		    
			var myOptions = {
		      zoom: 15,
		      center: position,
		      disableDefaultUI: true,
		      mapTypeId: google.maps.MapTypeId.ROADMAP,
			  scrollwheel:false
		    }
		    map = new google.maps.Map(document.getElementById("map"), myOptions);

		    var marker = new google.maps.Marker({
		        position: position, 
		        map: map
		    });
		
			$('div#map').hover(function(ev){
				map.setZoom(17);
			}, function(ev){
				map.setZoom(15);
				map.setCenter(position);
			});
		
		});