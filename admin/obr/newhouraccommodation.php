<?php
include("../../cdb.php");
$accommodation = intval($_POST[accommodation]);
$name = intval($_POST[name]);
$sum = intval($_POST[sum]);

if (empty($sum)) {
	echo "Введите стоимость";
} elseif ($accommodation == '0') {
	echo "Выберите тип проживания";
} elseif (empty($name)) {
	echo "Укажите кол-во недель";
} else {
	$go = mysql_query("INSERT INTO houraccommodation (cl, idAccommodation, sum) VALUES ('$name', '$accommodation', '$sum')");
	echo "Добавлено";
}
?>