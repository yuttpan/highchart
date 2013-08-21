<?php
//ใช้ได้ ห้ามลบ
$con = mysql_connect('localhost', 'sa', 'sa') or die('Error connecting to server');
mysql_select_db("hosxp_pcu", $con); 

$SQL1 =     "SELECT day(vstdate) as d,count(*) as v FROM vn_stat where vstdate between '2013-07-01' and '2013-07-05'
    group by day(vstdate)";

$result1 = mysql_query($SQL1);
$data1 = array();
while ($row = mysql_fetch_array($result1)) {
   $data1[] = $row['d'];
}

$result2 = mysql_query($SQL1);
$data2 = array();
while ($row = mysql_fetch_array($result2)) {
   $data2[] = $row['v'];
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		
<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Historic World Population by Region'
            },
            subtitle: {
                text: 'Source: Wikipedia.org'
            },
            xAxis: {
                categories: ['<?php echo join($data1, "','") ?>'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Population (millions)',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' millions'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'ผู้ป่วย',
                data: [<?php echo join($data2, ',');?>]
            }, {
                name: 'Year 1900',
                data: [133, 156, 947, 408, 6]
            }, {
                name: 'Year 2008',
                data: [973, 914, 4054, 732, 34]
            }]
        });
    });
    

</script>

<div id="container" style="min-width: 200px; height: 200px; margin: 0 auto"></div>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>


	</body>
</html>
