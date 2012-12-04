
  $(document).ready(function() {
  
    // Show partners simplemodal or not...
    var cookie = $.cookie('cdbetissanisidro');
    var today = new Date();

    if (cookie==null) {
      $("div.modal_partners").modal({
        onOpen:   function (dialog) {
                    dialog.data.show();
                    dialog.container.show();
      	            dialog.overlay.fadeIn('slow');
      	          },
        onClose:  function (dialog) {
                    dialog.container.fadeOut('fast',function(){
                      dialog.overlay.fadeOut('fast');
                    });
      	          }
      });
      $('div.modal_partners a.close').click(function(ev){
        ev.preventDefault();
        $.modal.close();
      });
      $.cookie('cdbetissanisidro', 'loteria', { expires: 3, path: '/' });
    }
  
  
    // Click last news
    $('ul#last_news li').click(function(ev){
      window.location.href = $(this).children('a').attr('href');
    });
  

    // Setup sponsors cycle elements
  	$('div.sponsors div.outer_block div.inner_block').cycle({timeout:10000, random:true});

  	// Order activity list
  	orderActivityList();
	
	
  	//Get home classification
    $.ajax({
  	  url: "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D%22http%3A%2F%2Ffutmadrid.com%2Fpref2%2Fpref2.htm%22%20and%20xpath%3D'%2F%2Ftable%5B%40id%3D%22table21%22%5D'&format=json&diagnostics=true",
  	  cache: false,
      dataType: "jsonp",
      jsonp: "callback",
  	  success: function(result) {
  		  var results = result.query.results.table.tbody.tr;
        $('#_classification').fadeOut(function(ev){
         $('table').fadeIn(function(ev){$('table').css('display','inline');});
        });
             
        var find = false;
        var count = 0;
		  
  		  for (var i=2; i<results.length; i++) {
  		    var data_team = [];
  		    for (var j=0; j<results[i].td.length; j++) {
  				  var text = unescape($.param(results[i].td[j],false));
  				  var cut = text.split(']=');
    				data_team.push(cut[cut.length-1]);
  		    }
  		    
          data_team[1] = getTeamName(data_team[1].toLowerCase());
  		    
          if (data_team[1].toLowerCase().search("betis")!=-1) {
            $("table tbody").append("<tr class='betis'><td class='center'>"+data_team[0]+"</td><td>Betis San Isidro</td><td class='center'>"+ data_team[2]+"</td><td class='center'>"+data_team[9]+"</td></tr>");
            find = true;
          } else {
            if (find) {
              if ($("table tbody tr").size()>4) {
                $("table tbody tr:eq(0)").remove();
                if (count<2) {
                  count++;
                  $("table tbody").append("<tr><td class='center'>"+data_team[0]+"</td><td>"+data_team[1]+"</td><td class='center'>"+data_team[2]+"</td><td class='center'>"+data_team[9]+"</td></tr>");
                } else {
                  return false;
                }
              } else {
                count++;
                $("table tbody").append("<tr><td class='center'>"+data_team[0]+"</td><td>"+data_team[1]+"</td><td class='center'>"+data_team[2]+"</td><td class='center'>"+data_team[9]+"</td></tr>");
              } 
            } else {              
              if ($("table tbody tr").size()>4) {
                $("table tbody tr:eq(0)").remove();
              }
              $("table tbody").append("<tr><td class='center'>"+data_team[0]+"</td><td>"+data_team[1]+"</td><td class='center'>"+data_team[2]+"</td><td class='center'>"+data_team[9]+"</td></tr>");
            }
          }
  		  }
  		  
  		  if ($("table tbody tr").size()>5) {
  		    $("table tbody tr:eq(0)").remove();
  		  }
  		}
  	});
	
	
	
	
  	//Get next match
  	if ($('div#map').length>0) {
	  
  	  // Start leaflet map
  	  var cloudmadeUrl = 'http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/5/256/{z}/{x}/{y}.png',
          cloudmade = new L.TileLayer(cloudmadeUrl, {maxZoom: 18});
      var map = new L.Map('map');
      map.setView(new L.LatLng(40.38048608016328,-3.723936080932617), 15).addLayer(cloudmade);
      var MatchIcon = L.Icon.extend({
          iconUrl: theme_url+'/images/map/marker.png',
          shadowUrl: theme_url+'/images/map/marker-shadow.png',
          iconSize: new L.Point(25, 41),
          shadowSize: new L.Point(41, 41),
          iconAnchor: new L.Point(12, 41),
          popupAnchor: new L.Point(0, -40)
      });
      var stadium = new MatchIcon();
	  
  	  var now = new Date();
  		var month = (now.getMonth()+1);
  		var hour = now.getHours() +':'+ now.getMinutes();



  		var today = month + '/' + now.getDate() + '/' + now.getFullYear();

  		sql="SELECT * FROM 5167826 WHERE Date >= '"+today+"' ORDER BY Date ASC LIMIT 1";
      $.ajax({
        url: "http://tables.googlelabs.com/api/query?sql="+escape(sql),
        dataType: "jsonp",
        jsonp: "jsonCallback",
  			timeout: 4000,
        error: function(msg) {
          var marker = new L.Marker(new L.LatLng(40.38048608016328,-3.723936080932617), {icon: stadium});
          map.addLayer(marker);
        },
        success: function(data) {
  				var result = data.table.rows[0];
  				if (result!=undefined) {
  				  $('div.head img:eq(0)').attr('title',result[0]);
  					$('div.head img:eq(0)').attr('src',theme_url + '/images/escudos/' + result[1]);
  					$('div.head img:eq(0)').attr('alt',result[1]);
  					$('div.head img:eq(1)').attr('title',result[2]);
  					$('div.head img:eq(1)').attr('alt',result[2]);
  					$('div.head img:eq(1)').attr('src',theme_url + '/images/escudos/' + result[3]);

  					$('div.bottom p.date').text(convertDate(result[8]));
  					$('div.bottom p.stadium').text(result[7]);
  					$('div.bottom p.place').text(result[6]);
  					if (result[9]=='') {
  						$('div.bottom p.time').text('Horario sin confirmar');
  					} else {
  						$('div.bottom p.time').text(result[9] + ' horas');
  					}

  					$('div#next_match').fadeOut('fast',function(ev){
  						$('div.next_match').fadeIn(function(){
  						  $('div.next_match').css('display','inline');
  						});
  					});

            var latlng_obj = result[4].split(',');
            var latlng = new L.LatLng(parseFloat(latlng_obj[0]),parseFloat(latlng_obj[1]));

  					// create a marker in the given location and add it to the map
            var marker = new L.Marker(latlng, {icon: stadium});
            map.setView(latlng, 14);
            map.addLayer(marker);

            // attach a given HTML content to the marker and immediately open it
            var info = new Object();
            info.stadium = result[7];
            info.address = result[5]; 
            info.city = result[6];
            marker.bindPopup("<h3><b>"+info.stadium+"</b></h3><p style='font-size:13px;padding:0;margin:0;text-align:center'>"+info.address+"<br/>"+info.city+"</p>");

  				} else {
            var latlng = new L.LatLng(40.38048608016328,-3.723936080932617);
  			    var marker = new L.Marker(latlng, {icon: stadium});
            map.addLayer(marker);
  			    marker.bindPopup("<h3><b>Ernesto Cotorruelo</b></h3><p style='font-size:13px;padding:0;margin:0;text-align:center'>Vía Lusitana 3,<br/> 28025 Madrid</p>");

  			    $('div.block:eq(1) h2').html('<a href="/club">Ernesto Cotorruelo</a>');
  			    $('div.block:eq(2) h2').html('Clasificación final');
  				  $('div#next_match p').html('La liga ha acabado pero<br/>puedes visitar los resultados<br/>de la temporada <a href="/resultados/">aquí</a>.');
  				}
        }
  		});
  	}

  });



  // Change team name to other correct one
  function getTeamName(str) {
    if (str.search('navalcarnero')!=-1) {return "C.D.A. Navalcarnero"}
    if (str.search('vicãlvaro')!=-1) {return "C.D. Vicálvaro"}
    if (str.search('fortuna')!=-1) {return "C.D. Fortuna"}
    if (str.search('leganãs')!=-1) {return "C.D. Leganés B"}
    if (str.search('lugo')!=-1) {return "Lugo Fuenlabrada"}
    if (str.search('bruno')!=-1) {return "Yébenes San Bruno"}
    if (str.search('arroyomolinos')!=-1) {return "U.D. Arroyomolinos"}
    if (str.search('juventud')!=-1) {return "Juventud U.R.J.C."}
    if (str.search('vallecas')!=-1) {return "Vallecas C.F."}
    if (str.search('oreja')!=-1) {return "Colmenar de Oreja"}  
    if (str.search('villaverde')!=-1) {return "Villaverde"}
    if (str.search('betis')!=-1) {return "Betis San Isidro"}
    if (str.search('eugenia')!=-1) {return "C.D. Santa Eugenia"}
    if (str.search('rivas')!=-1) {return "A.D.P.I. Rivas"}
    if (str.search('ãguilas')!=-1) {return "Águilas de Moratalaz"}
    if (str.search('carabanchel')!=-1) {return "E.F. Carabanchel"}
    if (str.search('pinto')!=-1) {return "Atlético Pinto 'B'"}
    return 'Atlético Velilla C.F.';
  }


  // Convert month number to text month
  function convertDate(date) {
  	var date_obj = date.split('/');
  	var month = "";
  	switch (parseInt(date_obj[0])) {
  		case 1: month="Enero"; break;
  		case 2: month="Febrero"; break;
  		case 3: month="Marzo"; break;
  		case 4: month="Abril"; break;
  		case 5: month="Mayo"; break;
  		case 6: month="Junio"; break;
  		case 7: month="Julio"; break;
  		case 8: month="Agosto"; break;
  		case 9: month="Septiembre"; break;
  		case 10: month="Octubre"; break;
  		case 11: month="Noviembre"; break;
  		default: month="Diciembre";
  	}
	
  	return date_str = date_obj[1].replace(/^[0]+/g,"") + ' de ' +month+', 20'+date_obj[2];
  }


  // Order activity list
  function orderActivityList() {
    var first_post = 'ul.comments li.post:eq(0)';
    var find = false;
    $('ul.comments li:lt(3)').each(function(i,ele){
      if (!find && $(first_post).attr('alt')>$(ele).attr('alt')) {
        $(first_post).insertBefore($(ele));
        find = true;
      }
    });
  
    var second_post = 'ul.comments li.post:eq(1)';
    find = false;
    $('ul.comments li:lt(3)').each(function(i,ele){
      if (!find && $(second_post).attr('alt')>$(ele).attr('alt')) {
        $(second_post).insertBefore($(ele));
        find = true;
      }
    });
  
    var third_post = 'ul.comments li.post:eq(2)';
    find = false;
    $('ul.comments li:lt(3)').each(function(i,ele){
      if (!find && $(third_post).attr('alt')>$(ele).attr('alt')) {
        $(third_post).insertBefore($(ele));
        find = true;
      }
    });
  }
