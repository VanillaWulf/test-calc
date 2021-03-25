<?php
include("../../cdb.php");
$name = htmlspecialchars($_POST[name]);

if (empty($name)) {
	echo "Введите название города";
} else {
	$go = mysql_query("INSERT INTO country (name) VALUES ('$name')");
	echo "Добавлено";
}
?>