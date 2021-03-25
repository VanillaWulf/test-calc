<?php
include("../../cdb.php");
$cl = intval($_POST[cl]);
$cours = intval($_POST[cours]);

if (empty($cl)) {
	echo "Введите кол-во часов для типа курса";
} elseif ($cours == '0') {
	echo "Выберите тип курса";
} else {
	$go = mysql_query("INSERT INTO hours (cl, idCours) VALUES ('$cl', '$cours')");
	echo "Добавлено";
}
?>