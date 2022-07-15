$(function(){
	Dashboard.index();
})

let Dashboard = {
   	index: () => {
   		Dashboard.fetch();
		Dashboard.pieChart();
		Dashboard.columnChart();
		Dashboard.pendingDeliveries();
		Dashboard.onProcessDeliveries();
		Dashboard.completedDeliveries();
		Dashboard.pendingReservations();
		Dashboard.onProcessReservations();
		Dashboard.completedReservations();
    },
    pendingDeliveries: () => {
    	Request.ajax('dashboard/count-deliveries','#d-pending',{status: 'pending'});
    },
    onProcessDeliveries: () => {
    	Request.ajax('dashboard/count-deliveries','#d-on-process',{status: 'on_process'});
    },
    completedDeliveries: () => {
    	Request.ajax('dashboard/count-deliveries','#d-completed',{status: 'completed'});
    },
    pendingReservations: () => {
    	Request.ajax('dashboard/count-reservations','#r-pending',{status: 'pending'});
    },
    onProcessReservations: () => {
    	Request.ajax('dashboard/count-reservations','#r-on-process',{status: 'on_process'});
    },
    completedReservations: () => {
    	Request.ajax('dashboard/count-reservations','#r-completed',{status: 'completed'});
    },
    fetch: () => {
   		Request.ajax('dashboard/fetch','#table-panel','',true);
    },
    pieChart: () => {
    	google.charts.load("current", {packages:["corechart"]});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
			var data = google.visualization.arrayToDataTable([
			['Task', 'Hours per Day'],
			['T1 5 Gallons Container',     11],
			['T2 5 Gallons Container', 2],
			['3 Gallons Container',      2],
			['2.5 Gallons Container',  2]
			]);

			var options = {
			is3D: true,
			chartArea:{width:'90%',height:'80%'},
			fontSize: 14
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
			chart.draw(data, options);
		}
    },
    columnChart: () => {
		google.charts.load('current', {'packages':['bar']});
		google.charts.setOnLoadCallback(drawStuff);

		function drawStuff() {
			var data = new google.visualization.arrayToDataTable([
			['Months', 'Sales (PHP)'],
			["August", 440],
			["September", 316],
			["October", 127],
			["November", 109],
			['December', 398]
			]);

			var options = {
				width: 690,
				legend: { position: 'none' },
				axes: {
					y: {
						0: { side: 'top', label: 'Sales (PHP)'} // Top x-axis.
					}
				},
				bar: { groupWidth: "70%" },
				fontSize: 14
			};

			var chart = new google.charts.Bar(document.getElementById('top_x_div'));
			// Convert the Classic options to Material options.
			chart.draw(data, google.charts.Bar.convertOptions(options));
		};
    }
};