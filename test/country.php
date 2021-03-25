<?php
include("../cdb.php");
$valinf = $_POST[valinf];
ob_start();

$countrys = mysql_query("SELECT * FROM country WHERE id='$valinf'");
while ($country = mysql_fetch_array($countrys)) {
	$citys = mysql_query("SELECT * FROM city WHERE idCountry='$country[id]' ORDER BY name");
	while ($city = mysql_fetch_array($citys)) {
		echo '"'.$city[name].'",';
	}
}

$blinf = ob_get_contents();
ob_end_clean();

$infcore = substr($blinf, 0, -1);

echo '['.$infcore.']';
?>