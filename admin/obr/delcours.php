<?php
include("../../cdb.php");

$id = intval($_POST[id]);
if (empty($id)) {
	echo "Ошибка. Обновите страницу.";
} else {
	$del = mysql_query("DELETE FROM cours WHERE id='$id'");
	echo "1";
}
?>