<?php
include("../../cdb.php");
$name = htmlspecialchars($_POST[name]);
$city = intval($_POST[city]);

if (empty($name)) {
	echo "Введите название курса";
} elseif ($city == '0') {
	echo "Выберите город";
} else {
	$go = mysql_query("INSERT INTO cours (name, idCity) VALUES ('$name', '$city')");
	echo "Добавлено";
}
?>