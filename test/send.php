<?php
include("../cdb.php");


$to = $_POST[to];
$td = $_POST[td];
$tt = $_POST[tt];
$th = $_POST[th];
$tp = $_POST[tp];
$nameuser = $_POST[nameuser];
$emailuser = $_POST[emailuser];
$finsum = $_POST[finsum];
$sum = $_POST[sum];
$comment = $_POST[comment];
$hous = $_POST[hous];
$aeroport = $_POST[aeroport];


if (empty($nameuser)) {
	echo "Введите ФИО";
} elseif (empty($emailuser)) {
	echo "Введите E-mail";
} elseif ($to == '0') {
	echo "Укажите страну";
} elseif ($td == '0') {
	echo "Укажите город";
} elseif ($tt == '0') {
	echo "Укажите курс";
} elseif ($th == '0') {
	echo "Укажите часы";
} elseif ($tp == '0') {
	echo "Укажите недели";
} elseif ($hous !== '1' AND $hous !== '2') {
	echo "Выберите требование размещение";
} elseif ($aeroport !== '1' AND $aeroport !== '2') {
	echo "Выберите: встречать вас с аэропорта или нет";
} else {
	$thssss = mysql_query("SELECT * FROM hours WHERE id='$th'");
	$thsss = mysql_fetch_array($thssss);
	$ttssst = mysql_query("SELECT * FROM cours WHERE id='$tt'");
	$ttsst = mysql_fetch_array($ttssst);
	$tossst = mysql_query("SELECT * FROM country WHERE id='$to'");
	$tosst = mysql_fetch_array($tossst);
	if ($hous == '1') {
		$housdecode = "Да";
	} elseif ($hous == '2') {
		$housdecode = "Нет";
	}

	if ($aeroport == '1') {
		$aeroportdecode = "Да";
	} elseif ($aeroport == '2') {
		$aeroportdecode = 'Нет';
	}

	$mailsls = "info@libertylingvo.com";

	$subject = "Заявка с сайта LibertyLingvo";

	$message = "
	<html>
	<head>
	</head>
	<body>
	<b>Информация о человеке</b>
	ФИО: $nameuser<br />
	E-mail: $emailuser<br /><br /><br /><br />

	<b>Выбрал для поездки:</b>
	Страна: $tosst[name]<br />
	Город: $td<br />
	Курс: $ttsst[name]<br />
	Количество часов: $thsss[cl] ч.<br />
	Количество недель: $tp нед.<br /><br />
	Требуется размещение? <b>$housdecode</b><br />
	Встречать с аэропорта? <b>$aeroportdecode</b><br />
	<b>Прямая цена школы:</b> $sum €<br />
	<b>ИТОГО (скидка 10%):<b> $finsum €<br />
	Комментарий к заказу: $comment <br />
	</body>
	</html>
	";

	/* Для отправки HTML-почты вы можете установить шапку Content-type. */
	$headers= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=urf-8\r\n";
	/* и теперь отправим из */
	mail($mailsls, $subject, $message, $headers);

	echo "1";
}
?>