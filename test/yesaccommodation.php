<?php
include("../cdb.php");
$valinf = $_POST[valinf];
$city = $_POST[city];
ob_start();

$accommodations = mysql_query("SELECT * FROM city WHERE name='$city'");
$accommodation = mysql_fetch_array($accommodations);
	$hours = mysql_query("SELECT * FROM accommodation WHERE idCity='$accommodation[id]'  ORDER BY name");
	while ($hour = mysql_fetch_array($hours)) {
		$hhinf = $hhinf.'"'.$hour[name].'",';
	}

$infcore = substr($hhinf, 0, -1);

echo '['.$infcore.']';

$blinf = ob_get_contents();
ob_end_clean();

ob_start();

$accommodationsss = mysql_query("SELECT * FROM city WHERE name='$city'");
$accommodations = mysql_fetch_array($accommodationsss);
	$hourss = mysql_query("SELECT * FROM accommodation WHERE idCity='$accommodations[id]' ORDER BY name");
	while ($hours = mysql_fetch_array($hourss)) {
		$hhinfs = $hhinfs.'"'.$hours[id].'",';
	}

$infcores = substr($hhinfs, 0, -1);

echo '['.$infcores.']';

$idinf = ob_get_contents();
ob_end_clean();

$phpage = array('accommodation'=>$blinf, 'idinf'=>$idinf);
echo json_encode($phpage);
?>
