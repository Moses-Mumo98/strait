  <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-gantt.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet"> 
    
  <div id="container"></div>
    
  
  <script>

      anychart.onDocumentReady(function () {
        // The data used in this sample can be obtained from the CDN
        // https://cdn.anychart.com/samples/gantt-working-with-data/simple-json-data/data.json
        anychart.data.loadJsonFile(
          'https://cdn.anychart.com/samples/gantt-working-with-data/gantt-tree-from-json/data.json',
          function (data) {
            // restoring chart from JSON with data
            var chart = anychart.fromJson(data);

            // set container id for the chart
            chart.container('container');

            // initiate chart drawing
            chart.draw();

            // zoom chart all dates range
            chart.fitAll();
          }
        );
      });
    
</script>       