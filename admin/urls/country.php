<form id='newcountryf'>
<input type='text' name='name' id='name' placeholder="| Название страны"><br />
<button type='button' onClick='newcountry();'>Добавить</button>
</form>

<div class='footercontent'>
<?php
include("../cdb.php");
$countrys = mysql_query("SELECT * FROM country ORDER BY id DESC");
while ($country = mysql_fetch_array($countrys)) {
	echo "
	<div id='infobl-$country[id]' style='padding: 5px;border-bottom: 1px dashed #505050;'>
		<span id='link-$country[id]'>
			<span id='newname-$country[id]'>$country[name]</span>
			<a onClick="."oprecountry('$country[id]');".">Редактировать</a>
			<a onClick="."delcountry('$country[id]');".">Удалить</a>
		</span>
		<span id='input-$country[id]' style='display: none;'>
			<input type='text' id='rename-$country[id]' value='$country[name]'>
			<a onClick="."recountry('$country[id]');".">Редактировать</a>
		</span>
	</div>";
}
?>
</div>