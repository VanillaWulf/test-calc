<?php
include("../../cdb.php");
$varik = $_POST[varik];
$hours = intval($_POST[hours]);

if (empty($varik)) {
	echo "Введите кол-во недель и стоимость";
} elseif ($hours == '0') {
	echo "Выберите кол-во часов";
} else {
	for($i = 0; $i < count($varik); $i++) {
	$varssss = substr($varik[$i][0], 0, -2);
	$expinf = explode("^", $varssss);
	
		$go = mysql_query("INSERT INTO month (cl, sum, idHours)
									  VALUES ('$expinf[0]', '$expinf[1]', '$hours')");
		echo "Добавлено";
	}
}
?>