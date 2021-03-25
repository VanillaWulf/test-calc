<?php
include("../../cdb.php");

$id = intval($_POST[id]);

$courss = mysql_query("SELECT * FROM hours WHERE idCours='$id' ORDER BY id DESC");
while ($cours = mysql_fetch_array($courss)) {
	echo "<option value='$cours[id]'>$cours[cl]</option>";
}
?>