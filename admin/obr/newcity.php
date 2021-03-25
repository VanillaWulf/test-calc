<?php
include("../../cdb.php");

$country = htmlspecialchars($_POST[country]);
$name = htmlspecialchars($_POST[name]);

if ($country == '0') {
	echo "Выберите страну";
} elseif (empty($name)) {
	echo "введите название города";
} else {
	$go = mysql_query("INSERT INTO city (name, idCountry) VALUES ('$name', '$country')");
	echo "Город добавлен";
}
?>