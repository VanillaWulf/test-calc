<?php
include("../cdb.php");
$valinf = $_POST[valinf];
$valcity = $_POST[valcity];
ob_start();

$courss = mysql_query("SELECT * FROM city y, cours c WHERE c.id='$valinf' AND y.name='$valcity'");
$cours = mysql_fetch_array($courss);
	$hours = mysql_query("SELECT * FROM hours WHERE idCours='$cours[id]'  ORDER BY cl");
	while ($hour = mysql_fetch_array($hours)) {
		$hhinf = $hhinf.'"'.$hour[cl].'",';
	}

$infcore = substr($hhinf, 0, -1);

echo '"'.$valcity.'": { "'.$valinf.'": ['.$infcore.'] }';

$blinf = ob_get_contents();
ob_end_clean();

ob_start();

$coursss = mysql_query("SELECT * FROM city y, cours c WHERE c.id='$valinf' AND y.name='$valcity'");
$courss = mysql_fetch_array($coursss);
	$hourss = mysql_query("SELECT * FROM hours WHERE idCours='$courss[id]'  ORDER BY cl");
	while ($hours = mysql_fetch_array($hourss)) {
		$hhinfs = $hhinfs.'"'.$hours[id].'",';
	}

$infcores = substr($hhinfs, 0, -1);

echo '['.$infcores.']';

$idinf = ob_get_contents();
ob_end_clean();

$phpage = array('cours'=>$blinf, 'idinf'=>$idinf);
echo json_encode($phpage);
?>
