

$(document).ready(function() {

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	$('div#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: ''
		},
		editable: false,
		events: [
			{
				id: 2,
				title: "Betis vs Juventud URJC",
				start: new Date(y, 8, 18)
			},
			{
				id: 3,
				title: "Villaverde vs Betis",
				start: new Date(y, 8, 25)
			},
			{
				id: 4,
				title: "Betis vs Álamo",
				start: new Date(y, 9, 2)
			},
			{
				id: 5,
				title: "Lugo vs Betis",
				start: new Date(y, 9, 9)
			},
			{
				id: 6,
				title: "Betis vs Aranjuez",
				start: new Date(y, 9, 16)
			},
			{
				id: 7,
				title: "Orcasitas vs Betis",
				start: new Date(y, 9, 23)
			},
			{
				id: 8,
				title: "Betis vs Loeches",
				start: new Date(y, 9, 30)
			},
			{
				id: 9,
				title: "Santa Eugenia vs Betis",
				start: new Date(y, 10, 6)
			},
			{
				id: 10,
				title: "Betis vs Ciempozuelos",
				start: new Date(y, 10, 13)
			},
			{
				id: 11,
				title: "Yébenes vs Betis",
				start: new Date(y, 10, 20)
			},
			{
				id: 12,
				title: "Betis vs Griñón",
				start: new Date(y, 10, 27)
			},
			{
				id: 13,
				title: "Boadilla vs Betis",
				start: new Date(y, 11, 4)
			},
			{
				id: 14,
				title: "Betis vs Vallecas",
				start: new Date(y, 11, 18)
			},
			{
				id: 15,
				title: "Leganés vs Betis",
				start: new Date(2012, 0, 8)
			},
			{
				id: 16,
				title: "Betis vs Alcorcón",
				start: new Date(2012, 0, 15)
			},
			{
				id: 17,
				title: "Betis vs Arroyomolinos",
				start: new Date(2012, 0, 22)
			},
			{
				id: 18,
				title: "Colmenar de Oreja vs Betis",
				start: new Date(2012, 0, 29)
			},
			{
				id: 19,
				title: "Juventud vs Betis",
				start: new Date(2012, 1, 5)
			},
			{
				id: 20,
				title: "Betis vs Villaverde",
				start: new Date(2012, 1, 12)
			},
			{
				id: 21,
				title: "Álamo vs Betis",
				start: new Date(2012, 1, 19)
			},
			{
				id: 22,
				title: "Betis vs Lugo",
				start: new Date(2012, 1, 26)
			},
			{
				id: 23,
				title: "Aranjuez vs Betis",
				start: new Date(2012, 2, 4)
			},
			{
				id: 24,
				title: "Betis vs Orcasitas",
				start: new Date(2012, 2, 11)
			},
			{
				id: 25,
				title: "Loeches vs Betis",
				start: new Date(2012, 2, 18)
			},
			{
				id: 26,
				title: "Betis vs Santa Eugenia",
				start: new Date(2012, 2, 25)
			},
			{
				id: 27,
				title: "Ciempozuelos vs Betis",
				start: new Date(2012, 3, 1)
			},
			{
				id: 28,
				title: "Betis vs Yébenes",
				start: new Date(2012, 3, 15)
			},
			{
				id: 29,
				title: "Griñón vs Betis",
				start: new Date(2012, 3, 22)
			},
			{
				id: 30,
				title: "Betis vs Boadilla",
				start: new Date(2012, 3, 29)
			},
			{
				id: 31,
				title: "Vallecas vs Betis",
				start: new Date(2012, 4, 6)
			},
			{
				id: 32,
				title: "Betis vs Leganés",
				start: new Date(2012, 4, 13)
			},
			{
				id: 33,
				title: "Alcorcón vs Betis",
				start: new Date(2012, 4, 20)
			},
			{
				id: 34,
				title: "Arroyomolinos vs Betis",
				start: new Date(2012, 4, 27)
			},
			{
				id: 35,
				title: "Betis vs Colmenar de Oreja",
				start: new Date(2012, 5, 3)
			}
		]
	});
	
	//Weird Hack - removing second calendar
	$('table.fc-header:eq(1)').remove();
	$('div.fc-content:eq(1)').remove();

});