<?php
include("../cdb.php");
$valinf = $_POST[valinf]; //Кол-во часов
$valcity = $_POST[valcity]; //Город
$valtypecours = $_POST[valtypecours]; //название курса
$valhour = $_POST[valhour];
ob_start();

$hours = mysql_query("SELECT * FROM city y, cours c, hours h, month m WHERE 
  (c.id='$valtypecours' AND h.id = '$valhour') AND ((y.name='$valcity' AND y.id = c.idCity) AND (h.idCours = c.id AND m.idHours = h.id)) ORDER BY m.id");
while ($hour = mysql_fetch_array($hours)) {
  $sum = $sum.'"'.$hour[cl].'":"'.$hour[sum].'", ';
}
$infcore = substr($sum, 0, -2);
echo '"'.$valcity.'": { "'.$valtypecours.'": { '.$infcore.' } }';

$blinf = ob_get_contents();
ob_end_clean();

echo $blinf;
?>