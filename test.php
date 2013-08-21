<?php

$con = mysql_connect('localhost', 'sa', 'sa') or die('Error connecting to server');
mysql_select_db("hi", $con); 

$SQL1 =     "SELECT * FROM hi";

$result1 = mysql_query($SQL1);
$data1 = array();
while ($row = mysql_fetch_array($result1)) {
   $data1[] = $row['Hi_villcode'];
}

$result2 = mysql_query($SQL1);
$data2 = array();
while ($row = mysql_fetch_array($result2)) {
   $data2[] = $row['Hi_value'];
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            title: {
                text: 'Monthly Average Temperature',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: WorldClimate.com',
                x: -20
            },
            xAxis: {
                categories: [<?php echo join($data1, ',') ?>]
            },
            yAxis: {
                title: {
                    text: 'Temperature (°C)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '°C'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Tokyo',
                data: [<?php echo join($data2, ',');?>]
            },  ]
        });
    });
    

		</script>
	</head>
	<body>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
