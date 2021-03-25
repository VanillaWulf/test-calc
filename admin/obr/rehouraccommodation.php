<?php
include("../../cdb.php");

$id = intval($_POST[id]);
$name = intval($_POST[name]);
$sum = intval($_POST[sum]);

if (empty($id)) {
	echo "Ошибка. Обновите страницу";
} elseif (empty($name)) {
	echo "Укажите название";
} elseif (empty($sum)) {
	echo "Укажите стоимость";
} else {
	$go = mysql_query("UPDATE houraccommodation SET cl='$name', sum='$sum' WHERE id='$id'");
	echo "1";
}
?>