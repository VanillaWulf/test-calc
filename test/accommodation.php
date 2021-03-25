<?php
include("../cdb.php");
$valinf = $_POST[valinf];
$city = $_POST[city];
ob_start();

	$hours = mysql_query("SELECT * FROM houraccommodation WHERE idAccommodation='$valinf' ORDER BY cl");
	while ($hour = mysql_fetch_array($hours)) {
		$hhinf = $hhinf.'"'.$hour[cl].'",';
	}

$infcore = substr($hhinf, 0, -1);

echo '['.$infcore.']';

$blinf = ob_get_contents();
ob_end_clean();

ob_start();

	$hourss = mysql_query("SELECT * FROM houraccommodation WHERE idAccommodation='$valinf' ORDER BY cl");
	while ($hours = mysql_fetch_array($hourss)) {
		$hhinfs = $hhinfs.'"'.$hours[id].'",';
	}

$infcores = substr($hhinfs, 0, -1);

echo '['.$infcores.']';

$idinf = ob_get_contents();
ob_end_clean();

ob_start();

	$hourss = mysql_query("SELECT * FROM accommodation WHERE id='$valinf'");
	while ($hours = mysql_fetch_array($hourss)) {
		$hhinfs = $hours[name];
	}

echo $hhinfs;

$nameinf = ob_get_contents();
ob_end_clean();

$phpage = array('accommodation'=>$blinf, 'idinf'=>$idinf, "name"=>$nameinf);
echo json_encode($phpage);
?>
