<?php
include("../cdb.php");
$valinf = $_POST[valinf];
ob_start();

$citys = mysql_query("SELECT * FROM city WHERE name='$valinf'");
while ($city = mysql_fetch_array($citys)) {
	$courss = mysql_query("SELECT * FROM cours WHERE idCity='$city[id]' ORDER BY name");
	while ($cours = mysql_fetch_array($courss)) {
		$course = $course.'"'.$cours[name].'",';
	}
	$infcore = substr($course, 0, -1);
	echo '"'.$city[name].'": ['.$infcore.']';
}

$blinf = ob_get_contents();
ob_end_clean();

ob_start();

$citys = mysql_query("SELECT * FROM city WHERE name='$valinf'");
while ($city = mysql_fetch_array($citys)) {
	$courss = mysql_query("SELECT * FROM cours WHERE idCity='$city[id]' ORDER BY name");
	while ($cours = mysql_fetch_array($courss)) {
		$courseid = $courseid.'"'.$cours[id].'",';
	}
	$infcoreid = substr($courseid, 0, -1);
	echo '['.$infcoreid.']';
}

$idinf = ob_get_contents();
ob_end_clean();


$phpage = array('city'=>$blinf, 'idinf'=>$idinf);
echo json_encode($phpage);
?>
