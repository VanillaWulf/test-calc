<?php
include("../../cdb.php");
session_start();
$sessid = $_SESSION[parse];
$ip = $_SERVER['SERVER_ADDR'];

if (empty($sessid)) {
	$login = htmlspecialchars($_POST[login]);
	$pass = htmlspecialchars($_POST[pass]);
	$users = mysql_query("SELECT * FROM adm WHERE login='$login' AND pass='$pass'");
	$cluser = mysql_num_rows($users);
	if ($cluser == '0') {
		echo "0";
	} else {
		$_SESSION[parse] = $ip;
		echo "1";
	}
} else {
	echo "0";
}
?>