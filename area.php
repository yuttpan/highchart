<?php
//ใช้ได้ ห้ามลบ
$con = mysql_connect('localhost', 'sa', 'sa') or die('Error connecting to server');
mysql_select_db("hosxp_pcu", $con); 

$SQL1 =     "SELECT day(vstdate) as d,count(*) as v FROM vn_stat where ym = '2013-07'
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
                type: 'area'
            },
            title: {
                text: 'US and USSR nuclear stockpiles'
            },
            subtitle: {
                text: 'Source: <a href="http://thebulletin.metapress.com/content/c4120650912x74k7/fulltext.pdf">'+
                    'thebulletin.metapress.com</a>'
            },
           xAxis:  {
                    categories: ['<?php echo join($data1, "','") ?>'],
                },
            yAxis: {
                title: {
                    text: 'Nuclear weapon states'
                },
                labels: {
                    formatter: function() {
                        return this.value / 1000 +'k';
                    }
                }
            },
            tooltip: {
                pointFormat: '{series.name} produced <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
            },
            
            series: [{
                name: 'USA',
                data: [<?php echo join($data2, ',');?>]
            }, {
                name: 'USSR/Russia',
                data: [null, null, null, null, null, null, null , null , null ,null,
                5, 25, 50, 120, 150, 200, 426, 660, 869, 1060, 1605, 2471, 3322,
                4238, 5221, 6129, 7089, 8339, 9399, 10538, 11643, 13092, 14478,
                15915, 17385, 19055, 21205, 23044, 25393, 27935, 30062, 32049,
                33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000, 37000,
                35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
                21000, 20000, 19000, 18000, 18000, 17000, 16000]
            }]
        });
    });
    

</script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>


	</body>
</html>
