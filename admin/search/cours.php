<?php
include("../../cdb.php");

$id = intval($_POST[id]);

$courss = mysql_query("SELECT * FROM cours WHERE idCity='$id' ORDER BY id DESC");
while ($cours = mysql_fetch_array($courss)) {
	echo "<option value='$cours[id]'>$cours[name]</option>";
}
?>