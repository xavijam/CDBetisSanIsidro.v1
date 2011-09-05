  var theme_url = "/wp-content/themes/CDBetisSanIsidro.v1";
  var before_li;

	$(document).ready(function() {
		
		if (!($.browser.msie && $.browser.version=="6.0") && !($.browser.msie && $.browser.version=="7.0")) {
		  $('a#login_link').click(function(ev){
  		  ev.stopPropagation();
  		  ev.preventDefault();
  		  toggleContainer(1);
  		});

  		$('a#register_link').click(function(ev){
  		  ev.stopPropagation();
  		  ev.preventDefault();
  		  toggleContainer(2);
  		});
		}

		
		
		//header close session
		$('div#menu.logged div.right a.close').hover(function(ev){
			$(this).parent().find('div.close_session').show();
		},function(ev){
			$(this).parent().find('div.close_session').hide();
		});
		
		if (typeof document.body.style.maxHeight == "undefined") {
		  //IE6 stuff
		  $('div#menu div.left ul li.parent').hover(function(){
        if (this!=before_li) {
          before_li = this;
  		    $('div#menu div.left ul li.parent ul').css('display','none');
  		    $(this).children('ul').css('display','block');
        } else {
          if (this==before_li && !$(this).children('ul').is(':visible')) {
    		    $(this).children('ul').css('display','block');
          }
        }
		  },function(){
		    $(this).children('ul').css('display','none');
		  });
		  
		  $('div#main div.right ul li').live({
		    mouseenter:
           function() {
     		     $(this).css('background-position','0 -70px');
           },
        mouseleave:
           function() {
     		     $(this).css('background-position','0 0');
           }
		  });

		}

		
		$.timeago.settings.strings = {
		   prefixAgo: "Hace",
		   prefixFromNow: "dentro de",
		   suffixAgo: "",
		   suffixFromNow: "",
		   seconds: "menos de un minuto",
		   minute: "un minuto",
		   minutes: "unos %d minutos",
		   hour: "una hora",
		   hours: "%d horas",
		   day: "un día",
		   days: "%d días",
		   month: "un mes",
		   months: "%d meses",
		   year: "un año",
		   years: "%d años"
		};
		
		
		$.getJSON('https://graph.facebook.com/99842919645/feed?access_token=218351218204660|Wq9rWKVEId5prKur2WkaYPKzERs&callback=?', function(result) {
		  try {
		    if (result.data[0].message.length>70) {
  				$('div.facebook h5 a').text(result.data[0].message.substr(0,70) + '...');
  			} else {
  				$('div.facebook h5 a').text(result.data[0].message);
  			}			
  			$('div.facebook p span').attr("title",result.data[0].updated_time.substr(0,result.data[0].updated_time.length-5)+"Z");
  			$("div.facebook p span").timeago();
  			$("div.facebook p").append(' en <a href="http://www.facebook.com/pages/CD-Betis-San-Isidro/99842919645" target="_blank">Facebook</a>');
		  } catch (e) {}
		});
		
		$.getJSON('http://api.twitter.com/1/statuses/user_timeline/BetisSanIsidro.json?callback=?', function(result) {
		  if (result[0].text.length>70) {
		    $('div.twitter h5 a').text(result[0].text.substr(0,70) + '...');
			} else {
  			$('div.twitter h5 a').text(result[0].text);
			}
			$('div.twitter p span').attr("title",result[0].created_at);
			$("div.twitter p span").timeago();
			$("div.twitter p").append(' en <a href="http://twitter.com/BetisSanIsidro" target="_blank">Twitter</a>');
		});
		
	});
	
	
	
	function toggleContainer(num) {
		switch(num) {
			case 1: 	$('body').unbind('click');
								if ($('#register_link').parent().children('div').is(':visible')) {
									$('#register_link').parent().children('div').hide();
									$('#register_link').css('color','#dddddd');
								}
								if ($('#login_link').parent().children('div').is(':visible')) {
									$('#login_link').parent().children('div').fadeOut();
									$('#login_link').css('color','#666666');
									$('#register_link').css('color','#666666');
								} else {
									$('#login_link').parent().children('div').fadeIn(function(){
										$('body').click(function(event) {
										    if (!$(event.target).closest('#loginWindow').length) {
										        $('#loginWindow').fadeOut();
														$('body').unbind('click');
														$('#login_link').css('color','#666666');
          									$('#register_link').css('color','#666666');
										    };
										});
									});
									$('#login_link').css('color','#333333');
									$('#register_link').css('color','#dddddd');
								}
								break;
			default: 	$('body').unbind('click');
								if ($('#login_link').parent().children('div').is(':visible')) {
									$('#login_link').parent().children('div').hide();
									$('#login_link').css('color','#dddddd');
								}
								if ($('#register_link').parent().children('div').is(':visible')) {
									$('#register_link').parent().children('div').fadeOut();
									$('#login_link').css('color','#666666');
									$('#register_link').css('color','#666666');
								} else {
									$('#register_link').parent().children('div').fadeIn(function(){
										$('body').click(function(event) {
										    if (!$(event.target).closest('#registerWindow').length) {
										        $('#registerWindow').fadeOut();
														$('body').unbind('click');
														$('#login_link').css('color','#666666');
														$('#register_link').css('color','#666666');
										    };
										});
									});
									$('#register_link').css('color','#333333');
									$('#login_link').css('color','#dddddd');
								}
		}
	}


	
	
	
	
	
	
	