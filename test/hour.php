<?php
include("../cdb.php");
$valinf = $_POST[valinf]; //Кол-во часов
$valcity = $_POST[valcity]; //Город
$valtypecours = $_POST[valtypecours]; //название курса
ob_start();

$hours = mysql_query("SELECT * FROM city y, cours c, hours h, month m WHERE 
	c.id='$valtypecours' AND ((y.name='$valcity' AND y.id = c.idCity) AND (h.idCours = c.id AND (m.idHours = h.id AND h.id = '$valinf')))   ORDER BY m.id");
while ($hour = mysql_fetch_array($hours)) {
	$sum = $sum.'"'.$hour[cl].'", ';
	
}
$infcore = substr($sum, 0, -2);
echo '"'.$valcity.'": { "'.$valinf.'": ['.$infcore.'] }';

$blinf = ob_get_contents();
ob_end_clean();

echo $blinf;
?>