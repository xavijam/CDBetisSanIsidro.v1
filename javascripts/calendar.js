

$(document).ready(function() {

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	sql="SELECT * FROM 5167826";
  $.ajax({
    url: "http://tables.googlelabs.com/api/query?sql="+escape(sql),
    dataType: "jsonp",
    jsonp: "jsonCallback",
		timeout: 4000,
    error: function(msg) {},
    success: function(data) {
    	var events = []
    		, matches = data.table.rows;

    	for (var i=0, l=matches.length; i<l; i++) {
    		var match = matches[i]
    			, date = match[8].split("/")
    			, event_ = {
    				id: i,
    				title: matches[i][0] + " vs " + matches[i][2],
    				start: new Date("20" + date[2], parseInt(date[0]) - 1, date[1])
    			}
    		events.push(event_);
  		}

  		$('div#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: ''
				},
				editable: false,
				events: events
			});
    }
  });
	
	//Weird Hack - removing second calendar
	$('table.fc-header:eq(1)').remove();
	$('div.fc-content:eq(1)').remove();

});