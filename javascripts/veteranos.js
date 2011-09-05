
  var first = true;
  var loading = true;
  var count = 0;

  $(document).ready(function(){
    
    $('body').bind('loaded',function(){
      count++;
      if (count==4) {
        $('div.loader').hide();
        $('div.middle.veteranos div.left div.inner_left').show();
        loading = false;
      }
    });
  
    $('div.top ul li a').click(function(ev){
      ev.stopPropagation();
      ev.preventDefault();
    });
  
    var position = $('div.top ul li:eq(0)').position();
    var size = $('div.top ul li:eq(0)').width();
    var move = position.left+(size/2)-39;
    $('span.arrow').css('margin-left',move+'px');
  
    createResults();
    createLeagueClassification();
    createCupClassification();
    nextMatch();
  });


  function goTo(where) {
    if (!loading) {
      if (where == 'start') {
        if (!$('div.top ul li:eq(0)').hasClass('selected')) {         
          $('div.top ul li').removeClass('selected');
          $('div.top ul li:eq(0)').addClass('selected');
          var position = $('div.top ul li:eq(0)').position();
          var size = $('div.top ul li:eq(0)').width();
          var move = position.left+(size/2)-39;
          $('div.middle span.arrow').animate({marginLeft:move+'px'},500);
          $('div.left').scrollTo({top:'0', left:'0'},500);
          var block_height = $('div.block:eq(0)').height() + 60;
          $('div.middle div.left').animate({height:block_height+'px'},200);
        }
      } else if (where == 'players') {  
        if (!$('div.top ul li:eq(1)').hasClass('selected')) {         
          $('div.top ul li').removeClass('selected');
          $('div.top ul li:eq(1)').addClass('selected');
          var position = $('div.top ul li:eq(1)').position();
          var size = $('div.top ul li:eq(1)').width();
          var move = position.left+(size/2)-39;
          $('div.middle span.arrow').animate({marginLeft:move+'px'},500);
          $('div.left').scrollTo({top:'0', left:'550px'},500);
          var block_height = $('div.block:eq(1)').height() + 60;
          $('div.middle div.left').animate({height:block_height+'px'},200);
        }
      } else if (where == 'results') {
        if (!$('div.top ul li:eq(2)').hasClass('selected')) {
          $('div.top ul li').removeClass('selected');
          $('div.top ul li:eq(2)').addClass('selected');
          var position = $('div.top ul li:eq(2)').position();
          var size = $('div.top ul li:eq(2)').width();
          var move = position.left+(size/2)-39;
          $('div.middle span.arrow').animate({marginLeft:move+'px'},500);
          $('div.left').scrollTo({top:'0', left:'1100px'},500);
          var block_height = $('div.block:eq(2)').height() + 60;
          $('div.middle div.left').animate({height:block_height+'px'},200);
        }
      } else if (where == 'clasliga') {
        if (!$('div.top ul li:eq(3)').hasClass('selected')) {
          $('div.top ul li').removeClass('selected');
          $('div.top ul li:eq(3)').addClass('selected');
          var position = $('div.top ul li:eq(3)').position();
          var size = $('div.top ul li:eq(3)').width();
          var move = position.left+(size/2)-39;
          $('div.middle span.arrow').animate({marginLeft:move+'px'},500);
          $('div.left').scrollTo({top:'0', left:'1650px'},500);
          var block_height = $('div.block:eq(3)').height() + 60;
          $('div.middle div.left').animate({height:block_height+'px'},200);
        }
      } else {
        if (!$('div.top ul li:eq(4)').hasClass('selected')) {
          $('div.top ul li').removeClass('selected');
          $('div.top ul li:eq(4)').addClass('selected');
          var position = $('div.top ul li:eq(4)').position();
          var size = $('div.top ul li:eq(4)').width();
          var move = position.left+(size/2)-39;
          $('div.middle span.arrow').animate({marginLeft:move+'px'},500);
          $('div.left').scrollTo({top:'0', left:'2200px'},500);
          var block_height = $('div.block:eq(4)').height() + 60;
          $('div.middle div.left').animate({height:block_height+'px'},200);
        }
      }
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
  		var new_date = new Object();
  		new_date.month = month;
  		new_date.day = date_obj[1];
  		new_date.year = date_obj[2];

  		return new_date;
  	}
    
    function createResults() {
      //Get next match
  		var now = new Date();
  		var first = true;
  		var month = (now.getMonth()+1);
  		var today = month + '/' + now.getDate() + '/' + now.getFullYear();

  		sql="SELECT * FROM 369709 WHERE Date < '"+today+"' ORDER BY Date ASC";
      $.ajax({
            url: "http://tables.googlelabs.com/api/query?sql="+escape(sql),
            dataType: "jsonp",
            jsonp: "jsonCallback",
  					timeout: 4000,
            error: function(msg) {alert(msg);},
            success: function(data) {
              var result = data.table.rows;
              var last;
              for (var i=0; i<result.length; i++) {
                var date = convertDate(result[i][5]);
                if (result[i][8]!='') {
                  var cronica = '<a href="'+result[i][8]+'">Crónica</a>';
                } else {
                  var cronica = '-';
                }
                
                if (first && date.month=='Marzo' && date.day>13) {
                  first = false;
                  $('div.'+date.month+' ul').append('<h4>Comienza la copa</h4>');
                }
                
                if ($('div.'+date.month).length==0) {
                  $('div.list_results').append('<div class="month '+date.month+'">'+
        						'<h3>'+date.month+' 20'+date.year+'</h3>'+
        						'<ul>'+
        							'<li>'+
        								'<p class="day">'+date.day+' '+date.month.substr(0,3)+'</p>'+
        								'<img src="'+result[i][1]+'" title="'+result[i][0]+'" alt="'+result[i][0]+'"/><span class="result"><label>'+result[i][0]+'  <strong> '+result[i][7]+' </strong>  '+result[i][2]+'</label></span><img src="'+result[i][3]+'" title="'+result[i][2]+'" alt="'+result[i][2]+'"/>'+
        								'<p class="chronic">'+cronica+'</p>'+
        							'</li>'+
        						'</ul>'+
        					'</div>');
                } else {
                  $('div.'+date.month+' ul').append('<li>'+
    								'<p class="day">'+date.day+' '+date.month.substr(0,3)+'</p>'+
    								'<img src="'+result[i][1]+'" title="'+result[i][0]+'" alt="'+result[i][0]+'"/><span class="result"><label>'+result[i][0]+'  <strong> '+result[i][7]+' </strong>  '+result[i][2]+'</label></span><img src="'+result[i][3]+'" title="'+result[i][2]+'" alt="'+result[i][2]+'"/>'+
    								'<p class="chronic">'+cronica+'</p>'+
    							'</li>');
                }
                last = i;
              }
              
              //Print last match result
              var last_score = result[last][7].split('-');
              $('span.bottom div.next_match p:eq(0)').text(result[last][0]);
              $('span.bottom div.next_match span img:eq(0)').attr('src',result[last][1]);
              $('span.bottom div.next_match p:eq(2)').text(last_score[0]);
              $('span.bottom div.next_match p:eq(3)').text(last_score[1]);
              $('span.bottom div.next_match span img:eq(1)').attr('src',result[last][3]);
              $('span.bottom div.next_match p:eq(4)').text(result[last][2]);
              
              $('body').trigger('loaded');
           }
  		});
    }



    function createLeagueClassification() {
      //Get next match
  		var now = new Date();
  		var month = (now.getMonth()+1);
  		var today = month + '/' + now.getDate() + '/' + now.getFullYear();

  		sql="SELECT * FROM 369902 ORDER BY Posicion ASC";
      $.ajax({
            url: "http://tables.googlelabs.com/api/query?sql="+escape(sql),
            dataType: "jsonp",
            jsonp: "jsonCallback",
  					timeout: 4000,
            error: function(msg) {alert(msg);},
            success: function(data) {
              var results = data.table.rows;
              for (var i=0; i<results.length; i++) {
                
                $("table#liga_veteranos tr:eq("+(i+1)+") td:eq(0)").text(i+1);
                
        				if (results[i][1]=="C.D. Betis San Isidro 'B'") {
        					$("table#liga_veteranos tr:eq("+(i+1)+") td:eq(1)").parent().addClass('betis');
        				}
        				
        				$("table#liga_veteranos tr:eq("+(i+1)+") td:eq(1)").text(results[i][1]);
        				$("table#liga_veteranos tr:eq("+(i+1)+") td:eq(2)").text(results[i][2]);
        				$("table#liga_veteranos tr:eq("+(i+1)+") td:eq(3)").text(results[i][3]);
        				$("table#liga_veteranos tr:eq("+(i+1)+") td:eq(4)").text(results[i][4]);
        				$("table#liga_veteranos tr:eq("+(i+1)+") td:eq(5)").text(results[i][5]);
        				$("table#liga_veteranos tr:eq("+(i+1)+") td:eq(6)").text(results[i][6]);
        				$("table#liga_veteranos tr:eq("+(i+1)+") td:eq(7)").text(results[i][7]);
        				$("table#liga_veteranos tr:eq("+(i+1)+") td:eq(8)").text(results[i][8]);
        				$("table#liga_veteranos tr:eq("+(i+1)+") td:eq(9)").text(results[i][9]);
        				$("table#liga_veteranos tr:eq("+(i+1)+") td:eq(10)").text(results[i][10]);
              }
              $('body').trigger('loaded');
           }
  		});
    }
    
    
    function createCupClassification() {
      //Get next match
  		var now = new Date();
  		var month = (now.getMonth()+1);
  		var today = month + '/' + now.getDate() + '/' + now.getFullYear();

  		sql="SELECT * FROM 592473 ORDER BY Posicion ASC";
      $.ajax({
            url: "http://tables.googlelabs.com/api/query?sql="+escape(sql),
            dataType: "jsonp",
            jsonp: "jsonCallback",
  					timeout: 4000,
            error: function(msg) {alert(msg);},
            success: function(data) {
              var results = data.table.rows;
              for (var i=0; i<results.length; i++) {
                
                $("table#copa_veteranos tr:eq("+(i+1)+") td:eq(0)").text(i+1);
                $("table.veteranos_inicio tr:eq("+(i+1)+") td:eq(0)").text(i+1);
                
        				if (results[i][1]=="C.D. Betis San Isidro 'B'") {
        					$("table#copa_veteranos tr:eq("+(i+1)+") td:eq(1)").parent().addClass('betis');
        					$("table.veteranos_inicio tr:eq("+(i+1)+") td:eq(1)").parent().addClass('betis');
        				}
        				
        				$("table#copa_veteranos tr:eq("+(i+1)+") td:eq(1)").text(results[i][1]);
        				if (results[i][1].length>25) {
          				$("table.veteranos_inicio tr:eq("+(i+1)+") td:eq(1)").text(results[i][1].substr(0,22)+'...');
        				} else {
          				$("table.veteranos_inicio tr:eq("+(i+1)+") td:eq(1)").text(results[i][1]);
        				}
        				
        				$("table#copa_veteranos tr:eq("+(i+1)+") td:eq(2)").text(results[i][2]);
        				$("table.veteranos_inicio tr:eq("+(i+1)+") td:eq(2)").text(results[i][2]);

        				$("table#copa_veteranos tr:eq("+(i+1)+") td:eq(3)").text(results[i][3]);
        				$("table#copa_veteranos tr:eq("+(i+1)+") td:eq(4)").text(results[i][4]);
        				$("table#copa_veteranos tr:eq("+(i+1)+") td:eq(5)").text(results[i][5]);
        				$("table#copa_veteranos tr:eq("+(i+1)+") td:eq(6)").text(results[i][6]);
        				$("table#copa_veteranos tr:eq("+(i+1)+") td:eq(7)").text(results[i][7]);
        				$("table#copa_veteranos tr:eq("+(i+1)+") td:eq(8)").text(results[i][8]);
        				$("table#copa_veteranos tr:eq("+(i+1)+") td:eq(9)").text(results[i][9]);
        				$("table.veteranos_inicio tr:eq("+(i+1)+") td:eq(3)").text(results[i][9]);
        				
        				$("table.veteranos tr:eq("+(i+1)+") td:eq(10)").text(results[i][10]);
              }
              $('body').trigger('loaded');
           }
  		});
    }
    
    
    
    function nextMatch() {
      //Get next match
  		var now = new Date();
  		var month = (now.getMonth()+1);
  		var today = month + '/' + now.getDate() + '/' + now.getFullYear();

  		sql="SELECT * FROM 369709 WHERE Date > '"+today+"' ORDER BY Date ASC LIMIT 1";
      $.ajax({
            url: "http://tables.googlelabs.com/api/query?sql="+escape(sql),
            dataType: "jsonp",
            jsonp: "jsonCallback",
  					timeout: 4000,
            error: function(msg) {alert(msg);},
            success: function(data) {
              try {
                var results = data.table.rows;
                var date = convertDate(results[0][5]);
                $('span.top div.next_match p:eq(0)').text(results[0][0]);
                $('span.top div.next_match span img:eq(0)').attr('src',results[0][1]);
                $('span.top div.next_match span img:eq(1)').attr('src',results[0][3]);
                $('span.top div.next_match p:eq(2)').text(results[0][2]);
                $('span.top div.date p.month').text(date.month.substr(0,3));
                $('span.top div.date p.day').text(date.day);
                $('span.top div.date p.hour').text(results[0][6]);
                $('body').trigger('loaded');
              } catch(e) {
                $('span.top h3').text('LA LIGA HA ACABADO');
                $('span.top div.next_match').hide();
                $('span.top div.date').hide();
                $('body').trigger('loaded');
              }
           }
  		});
    }
    



