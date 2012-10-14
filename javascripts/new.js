

		$(document).ready(function() {
		  
		  var image = $('div.entry-content img');
		  $('div.entry-content p:eq(0)').prepend(image);
		  
		  $('p.comment-form-comment label').remove();
		  $('div#respond h3').html('Puedes escribir un comentario <strong>:)</strong>');
		  $('div#respond form textarea').addClass('text_area');
		  $('div#respond input[type="submit"]').addClass('submit_button');
		  
			$(".gallery a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'light_rounded',slideshow:2000, autoplay_slideshow: false});
			$('ol li:last').addClass('last');
		});