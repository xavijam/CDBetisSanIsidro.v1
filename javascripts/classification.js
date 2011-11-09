

	$(document).ready(function() {
	  
	  
	  //Get home classification
    $.ajax({
		  url: "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D%22http%3A%2F%2Ffutmadrid.com%2Fpref2%2Fpref2.htm%22%20and%20xpath%3D'%2F%2Ftable%5B%40id%3D%22table21%22%5D'&format=json&diagnostics=true",
		  cache: false,
      dataType: "jsonp",
      jsonp: "callback",
		  success: function(result) {
			  var results = result.query.results.table.tbody.tr;
			  for (var i=2; i<results.length; i++) {
			    var data_team = [];
			    for (var j=0; j<results[i].td.length; j++) {
  				  var text = unescape($.param(results[i].td[j],false));
  				  var cut = text.split(']=');
  				  data_team.push(cut[cut.length-1]);
			    }
			    data_team[1] = getTeamName(data_team[1].toLowerCase());
          $("table tr:eq("+(i-1)+") td:eq(0)").text(i-1);
          if (data_team[1].search("Betis")!=-1) {
  					$("table tr:eq("+(i-1)+") td:eq(1)").parent().addClass('betis');
  				}
          $("table tr:eq("+(i-1)+") td:eq(1)").text(data_team[1]);
          $("table tr:eq("+(i-1)+") td:eq(2)").text(data_team[2]);
          $("table tr:eq("+(i-1)+") td:eq(3)").text(data_team[3]);
          $("table tr:eq("+(i-1)+") td:eq(4)").text(data_team[4]);
          $("table tr:eq("+(i-1)+") td:eq(5)").text(data_team[6]);
          $("table tr:eq("+(i-1)+") td:eq(6)").text(data_team[5]);
          $("table tr:eq("+(i-1)+") td:eq(7)").text(data_team[7]);
          $("table tr:eq("+(i-1)+") td:eq(8)").text(data_team[8]);
          $("table tr:eq("+(i-1)+") td:eq(9)").text(data_team[9]);
			  }

  			$('div.classification div.loader').fadeOut(function(ev){
    			$('div.classification table').fadeIn(function(){
    			  $('div.classification').css('height','auto');
    			  if (msieversion()>0) 
    			    $('div.classification table').css('display','inline');
    			});
  			});
			}
		});

	});
	
	
	function msieversion() {
      var ua = window.navigator.userAgent
      var msie = ua.indexOf ( "MSIE " )

      if ( msie > 0 )      // If Internet Explorer, return version number
         return parseInt (ua.substring (msie+5, ua.indexOf (".", msie )))
      else                 // If another browser, return 0
         return 0
   }
   
   
   function getTeamName(str) {
     if (str.search('vallecas')!=-1) {return "Vallecas C.F."}
     if (str.search('gri')!=-1) {return "C.D. Griñon"}
     if (str.search('aranjuez')!=-1) {return "Real Aranjuez"}
     if (str.search('loeches')!=-1) {return "C.D. Loeches"}
     if (str.search('anãs')!=-1) {return "C.D. Leganés B"}
     if (str.search('eugenia')!=-1) {return "C.D. Santa Eugenia"}
     if (str.search('lugo')!=-1) {return "Lugo Fuenlabrada"} 
     if (str.search('arroyomolinos')!=-1) {return "U.D. Arroyomolinos"}
     if (str.search('oreja')!=-1) {return "Colmenar de Oreja"}
     if (str.search('ciempozuelos')!=-1) {return "C.D. Ciempozuelos"}
     if (str.search('idro')!=-1) {return "Betis San Isidro"}
     if (str.search('bruno')!=-1) {return "Yébenes San Bruno"}
     if (str.search('villaverde')!=-1) {return "Villaverde"}
     if (str.search('boadilla')!=-1) {return "Boadilla"}
     if (str.search('ãlamo')!=-1) {return "C.D. El Álamo"}
     if (str.search('orcasitas')!=-1) {return "A.D. Orcasitas"}
     if (str.search("alcorcãn")!=-1) {return "A.D. Alcorcón B"}
     if (str.search('juventud')!=-1) {return "Juventud U.R.J.C."}
     return 'Ciempozuelos';
   }