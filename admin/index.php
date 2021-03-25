<html>
<head>
<link rel="stylesheet" href="/admin/style.css" type="text/css">
<script type="text/javascript" src="/admin/js/jquery.js"></script>
<script type="text/javascript" src="/admin/js/obrphp.js"></script>
</head>

<body>
<?php
include("/cdb.php");
session_start();
$sessid = $_SESSION[parse];
$ip = $_SERVER['SERVER_ADDR'];

if (empty($sessid)) {
	echo "
	Введите логин:<br />
	<input type='text' id='login'><br />
	Введите пароль:<br />
	<input type='password' id='pass'><br />
	<button type='button' onClick='login();'>Войти</button>";
} else {
	if ($sessid == $ip) {
		echo "
		<div class='block'>
		<div class='link'>
			<a href='/admin/country/'>Страны</a>
			<a href='/admin/city/'>Города</a>
			<a href='/admin/cours/'>Типы курсов</a>
			<a href='/admin/hours/'>Часы занятий</a>
			<a href='/admin/month/'>Кол-во месяцев</a>
			<a href='/admin/accommodation/'>Тип размещения</a>
			<a href='/admin/houraccommodation/'>Кол-во недель размещения</a>
		</div>

		<div class='content'>";
		$getu = htmlspecialchars($_GET[u]);
			if ($getu == 'country' OR empty($getu)) {
				include("urls/country.php");
			} elseif ($getu == 'city') {
				include("urls/city.php");
			} elseif ($getu == 'cours') {
				include("urls/cours.php");
			} elseif ($getu == 'hours') {
				include("urls/hours.php");
			} elseif ($getu == 'month') {
				include("urls/month.php");
			} elseif ($getu == 'accommodation') {
				include("urls/accommodation.php");
			} elseif ($getu == 'houraccommodation') {
				include("urls/houraccommodation.php");
			} else {
				echo "Ошибка. Такой страницы не существует";
			}
		echo "
		</div>";
	} else {
		echo "ERROR";
	}
}
?>
</body>
</html>