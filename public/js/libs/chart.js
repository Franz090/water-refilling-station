let Chart = {
   index: (params) =>{

      let container = params['container'];
      let packages = params['packages'];
      let data = params['data'];
      let legends = (typeof params['legends'] != 'undefined' || params['legends'] != null) ? params['legends'] : '';
      let title = (typeof params['curbutton'] != 'undefined' || params['curbutton'] != null) ? params['curbutton'] : "Today's";

      google.charts.load('current', {'packages':[packages]});

      switch (packages) {
         case "corechart":
            if(data.length != 0){
               google.charts.setOnLoadCallback(function () {
                  Chart.corechart(container,data);
               });
            }else{
               $(`#${container}`).html('<h3 style="margin:auto">No data to show</h3>');
            }
         break;
         case "bar":
            google.charts.load('current', {
               callback: () => Chart.bar(container,legends,title,data),
               packages: ['corechart']
            });
         break;
      }
   },
   corechart: (container, data) => {

      // console.log(data);
      let categories = ['Month', 'Sales ($)', 'Count of Sales','Visa','Mastercard','Transactions'];
      
      var sixMonthsData = [
         categories,
         [`${data[0][1]}`],
         [`${data[1][1]}`],
         [`${data[2][1]}`],
         [`${data[3][1]}`],
         [`${data[4][1]}`],
         [`${data[5][1]}`]
      ];

      for (i = 2; i < data[0].length; i++) {
         sixMonthsData[1].push(parseInt(data[0][i]));
         sixMonthsData[2].push(parseInt(data[1][i]));
         sixMonthsData[3].push(parseInt(data[2][i]));
         sixMonthsData[4].push(parseInt(data[3][i]));
         sixMonthsData[5].push(parseInt(data[4][i]));
         sixMonthsData[6].push(parseInt(data[5][i]));
      }

      if(data.length == 7){
         var lastMonth = [`${data[6][1]}`];
         sixMonthsData.push(lastMonth);

         for (i = 2; i < data[6].length; i++) {
            lastMonth.push(parseInt(data[6][i]));
         }
      }

      let sixMonthfFromNow = data[0][1] +" "+ data[0][0];
      var curMonth = data[data.length-1];
      var curMonth = curMonth[1] + " " + curMonth[0];

      var options = {
         title: `Performance comparison for the past 6 months (${sixMonthfFromNow} - ${curMonth})`,
         curveType: 'function',
         animation: {
            duration: 1000,
            easing: "out",
            startup: true
         },
         lineWidth: 3,
         legend: { position: 'bottom' },
         colors:['#7CEFEF','#74B9FF','#A29BFE','#FBDD7F','#38ADA9'],
         pointSize: 3,
         hAxis : { 
            textStyle : {
               fontSize: 13,
               color: "#494949",
            },
            slantedText: true,
            slantedTextAngle: 45,
            viewWindowMode: "maximized",
         },
         vAxis: {
            format: '#,##0',
            gridlines: {
               count: 5,
            },
            slantedText: false,
            textStyle : {
               fontSize: 13,
               color: "#494949",
            },
         },
         chartArea: {
            width: "80%",
            top: '60',
            backgroundColor:{
               stroke: '#CCC',
               strokeWidth: 1
            }
         },
         focusTarget: 'category',
         fontSize: '15px',
         titleTextStyle: { 
            color: '#494949',
            fontSize: '17'
         },
      };

      var data = google.visualization.arrayToDataTable(sixMonthsData);

      var chart = new google.visualization.LineChart(document.getElementById(container));
      chart.draw(data, options);
   },

   bar: (container, legends, title, data) => {

        switch (title) {
          case "Weeks":
              title="This Week's";
              break;
          case "Month":
              title="This Month's";
              break;
          case "Day":
              title="Today's"
          default:
              title=title;
          break;
      }
      
      var data = google.visualization.arrayToDataTable([
         ['Labels', 'Total', { role: 'style' }],
         [`${legends[0]}`,parseInt(data['sales']), '#74B9FF'],
         [`${legends[1]}`,parseInt(data['count_of_sales']), '#81ECEC'],
         [`${legends[2]}`,parseInt(data['visa']), '#A29BFE'],
         [`${legends[3]}`,parseInt(data['mastercard']), '#FFEAA7'],
         [`${legends[4]}`,parseInt(data['total_txn']), '#38ADA9'],
      ]);

      var options = {
         title: `${title} Performance`,
         animation: {
            duration: 1000,
            easing: "out",
            startup: true
         },
         titleTextStyle: { 
            color: '#494949',
            fontSize: '17'
         },
         legend: { position: 'none' },
         bar: { groupWidth: "70%" },
         colors:['#74B9FF','#81ECEC','#A29BFE','#FFEAA7','#38ADA9'],
         chartArea: {
            width: "70%",
            height: "72%",
            left: '100',
            top: '60',
            backgroundColor:{
               stroke: '#CCC',
               strokeWidth: 1
            } 
         },
         vAxis : { 
            textStyle : {
               fontSize: 13,
               color: "#494949",
            },
            viewWindowMode: 'maximized'
         },
         hAxis: {
            gridlines: {
              color: "#CCC"
            },
            baselineColor: '#CCC'
          },
      };

      var chart = new google.visualization.BarChart(
        document.getElementById(container)
      );

      chart.draw(data, options);
   }
};
