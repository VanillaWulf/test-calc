<?php
include("../../cdb.php");

$id = intval($_POST[id]);
$name = intval($_POST[name]);

if (empty($id)) {
	echo "Ошибка. Обновите страницу";
} elseif (empty($name)) {
	echo "Укажите название";
} else {
	$go = mysql_query("UPDATE hours SET cl='$name' WHERE id='$id'");
	echo "1";
}
?>