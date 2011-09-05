
  var first = true;

	$(document).ready(function(){
	  
	  $('a#info_').click(function(ev){
	    ev.stopPropagation();
	    ev.preventDefault();
      goTo('info');
	  });
	  
	  $('a#stadium_').click(function(ev){
	    ev.stopPropagation();
	    ev.preventDefault();
	    goTo('stadium');
	  });
	  
	  $('a#organigram_').click(function(ev){
	    ev.stopPropagation();
	    ev.preventDefault();
	    goTo('organigram');
	  });
	  
	  var position = $('div.top ul li:eq(0)').position();
    var size = $('div.top ul li:eq(0)').width();
    var move = position.left+(size/2)-39;
	  $('span.arrow').css('margin-left',move+'px');
	  
	  if (msieversion()<=0) {	    
  	  var myOptions = {
        zoom: 15,
        center: new google.maps.LatLng(40.381172590810586, -3.723292350769043),
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
  	  scrollwheel:false
      }
      map = new google.maps.Map(document.getElementById("stadium_map"), myOptions);

      var marker = new google.maps.Marker({
          position: new google.maps.LatLng(40.381172590810586, -3.723292350769043), 
          map: map,
          title: 'Ernesto Cotorruelo'
      });
    }
	  
	});
	
	
	function goTo(where) {
	  if (where == 'info') {
	    //IF IE hide stadium map
	    if(msieversion()>0){
  	    $('div#stadium_map').hide();
      }
	    $('div.top ul li').removeClass('selected');
	    $('div.top ul li:eq(0)').addClass('selected');
	    
	    var position = $('div.top ul li:eq(0)').position();
	    var size = $('div.top ul li:eq(0)').width();
	    var move = position.left+(size/2)-39;
	    
	    $('div.middle span.arrow').animate({marginLeft:move+'px'},500);
	    
	    $('div.left').scrollTo({top:'0', left:'0'},500);
	    $('div.club div.left').height(500);
      $('div.club div.left div.inner_left').height(500);
	  } 
	  
	  if (where == "stadium") {
	    $('div.top ul li').removeClass('selected');
	    $('div.top ul li:eq(1)').addClass('selected');
	    
	    var position = $('div.top ul li:eq(1)').position();
	    var size = $('div.top ul li:eq(1)').width();
	    var move = position.left+(size/2)-39;
	    
	    $('div.middle span.arrow').animate({marginLeft:move+'px'},500);
	    $('div.left').scrollTo({top:'0', left:'550px'},500,function(){
	      $('div.club div.left').height(500);
	      $('div.club div.left div.inner_left').height(500);
	      // if IE
	      if(msieversion()>0){
          $('div#stadium_map').show();
  	      if (first) {
  	        first = false;
      	    var myOptions = {
              zoom: 15,
              center: new google.maps.LatLng(40.381172590810586, -3.723292350769043),
              disableDefaultUI: true,
              mapTypeId: google.maps.MapTypeId.ROADMAP,
        	  scrollwheel:false
            }
            map = new google.maps.Map(document.getElementById("stadium_map"), myOptions);

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.381172590810586, -3.723292350769043), 
                map: map,
                title: 'Ernesto Cotorruelo'
            });
  	      }
        }
	    });
	  }
	  
	  if (where=="organigram") {
	    $('div.top ul li').removeClass('selected');
	    $('div.top ul li:eq(2)').addClass('selected');
	    
	    var position = $('div.top ul li:eq(2)').position();
	    var size = $('div.top ul li:eq(2)').width();
	    var move = position.left+(size/2)-39;
	    
	    $('div.middle span.arrow').animate({marginLeft:move+'px'},500,function(){
	      $('div.club div.left').height(700);
	      $('div.club div.left div.inner_left').height(700);
	    });

	    $('div.left').scrollTo({top:'0', left:'1100px'},500);
	  }
	}
	
	
	function msieversion() {
      var ua = window.navigator.userAgent
      var msie = ua.indexOf ( "MSIE " )

      if ( msie > 0 )      // If Internet Explorer, return version number
         return parseInt (ua.substring (msie+5, ua.indexOf (".", msie )))
      else                 // If another browser, return 0
         return 0

   }
	
	