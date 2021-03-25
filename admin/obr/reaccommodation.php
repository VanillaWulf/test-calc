<?php
include("../../cdb.php");

$id = intval($_POST[id]);
$name = htmlspecialchars($_POST[name]);

if (empty($id)) {
	echo "Ошибка. Обновите страницу";
} elseif (empty($name)) {
	echo "Укажите название";
} else {
	$go = mysql_query("UPDATE accommodation SET name='$name' WHERE id='$id'");
	echo "1";
}
?>