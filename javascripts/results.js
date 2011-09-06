
  $(document).ready(function(){
    //Get next match
		var now = new Date();
		var month = (now.getMonth()+1);
		var today = month + '/' + now.getDate() + '/' + now.getFullYear();
		
		sql="SELECT * FROM 278823 WHERE Date < '"+today+"' ORDER BY Date ASC";
    $.ajax({
          url: "http://tables.googlelabs.com/api/query?sql="+escape(sql),
          dataType: "jsonp",
          jsonp: "jsonCallback",
					timeout: 4000,
          error: function(msg) {alert(msg);},
          success: function(data) {
            var result = data.table.rows;
            $('div.loader').fadeOut();
            for (var i=0; i<result.length; i++) {
              var date = convertDate(result[i][8]);
              
              if (result[i][11]!='') {
                var cronica = '<a href="'+result[i][11]+'">Crónica</a>';
              } else {
                var cronica = '-';
              }
              
              if ($('div.'+date.month).length==0) {
                $('div.list_results').append('<div class="month '+date.month+'">'+
      						'<h3>'+date.month+' 20'+date.year+'</h3>'+
      						'<ul>'+
      							'<li>'+
      								'<p class="day">'+date.day+' '+date.month.substr(0,3)+'</p>'+
      								'<p class="hour">'+result[i][9]+' horas</p>'+
      								'<img src="'+theme_url+'/'+result[i][1]+'" title="'+result[i][0]+'" alt="'+result[i][0]+'"/><span class="result"><label>'+result[i][0]+'  <strong> '+result[i][10]+' </strong>  '+result[i][2]+'</label></span><img src="'+theme_url+'/'+result[i][3]+'" title="'+result[i][2]+'" alt="'+result[i][2]+'"/>'+
      								'<p class="chronic">'+cronica+'</p>'+
      							'</li>'+
      						'</ul>'+
      					'</div>');
              } else {
                $('div.'+date.month+' ul').append('<li>'+
  								'<p class="day">'+date.day+' '+date.month.substr(0,3)+'</p>'+
  								'<p class="hour">'+result[i][9]+' horas</p>'+
  								'<img src="'+result[i][1]+'" title="'+result[i][0]+'" alt="'+result[i][0]+'"/><span class="result"><label>'+result[i][0]+'  <strong> '+result[i][10]+' </strong>  '+result[i][2]+'</label></span><img src="'+result[i][3]+'" title="'+result[i][2]+'" alt="'+result[i][2]+'"/>'+
  								'<p class="chronic">'+cronica+'</p>'+
  							'</li>');
              }
              $('div.results').css('height','auto');
            }
         }
		});
  });
  
  
  
  
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
