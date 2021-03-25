<?php
include("../cdb.php");
$valinf = $_POST[valinf];
$city = $_POST[city];
ob_start();

	$hours = mysql_query("SELECT * FROM houraccommodation WHERE id='$valinf'");
	while ($hour = mysql_fetch_array($hours)) {
		$hhinf = $hour[sum];
	}

echo $hhinf;

$blinf = ob_get_contents();
ob_end_clean();

$phpage = array('sum'=>$blinf);
echo json_encode($phpage);
?>
