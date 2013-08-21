<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>
<script src="js/jquery-1.7.1.min"></script>
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

<script type="text/javascript">
$(document).ready(function() {
    var chart = new Highcharts.Chart({
          chart: {
             renderTo: 'container',
             type: 'line'
          },

        title:  {
                    text: 'Comming Data'
                },

        xAxis:  {
                    categories: ['<?php echo join($data1, "','") ?>'],
                },

        yAxis:  {
                    min:0,

                },

        legend: {
                    layout: 'vertical',
                    backgroundColor: '#FFFFFF',
                    align: 'left',
                    verticalAlign: 'top',
                    x: 50,
                    y: 35,
                    floating: true,
                    shadow: true
                },

        plotOptions: {
                        column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                    },

        series: [   {
                        name: 'Data',
                        data: ['<?php echo join($data2, "','") ?>'],
                       // pointStart: 0
                        //pointInterval
                    },


                ]
    });
});
</script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

