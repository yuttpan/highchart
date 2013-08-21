<?php
$con = mysql_connect("localhost","sa","sa");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("hi", $con);

$result = mysql_query("SELECT * FROM hi ");

while($row = mysql_fetch_array($result)) {
  echo $row['Hi_date'] . "\t" . $row['Hi_value']. "\n";
}

mysql_close($con);
?> 