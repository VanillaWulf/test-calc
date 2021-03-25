<form id='newcityf'>
	<input type='text' name='name' id='name' placeholder="| Название города"><br />
	<select name='country'>
		<option value="0">Выберите страну</option>
		<?php
			include("../cdb.php");
			$countrys = mysql_query("SELECT * FROM country ORDER BY id DESC");
			while ($country = mysql_fetch_array($countrys)) {
				echo "<option value='$country[id]'>$country[name]</option>";
			}
		?>
	</select><br />
	<button type='button' onClick='newcity();'>Добавить</button>
</form>

<div class='footercontent'>
<?php
$citys = mysql_query("SELECT * FROM city ORDER BY id DESC");
while ($city = mysql_fetch_array($citys)) {
	echo "
	<div id='infobl-$city[id]' style='padding: 5px;border-bottom: 1px dashed #505050;'>
		<span id='link-$city[id]'>
			<span id='newname-$city[id]'>$city[name]</span>
			<a onClick="."oprecountry('$city[id]');".">Редактировать</a>
			<a onClick="."delcity('$city[id]');".">Удалить</a>
		</span>
		<span id='input-$city[id]' style='display: none;'>
			<input type='text' id='rename-$city[id]' value='$city[name]'>
			<a onClick="."recity('$city[id]');".">Редактировать</a>
		</span>
	</div>";
}
?>
</div>