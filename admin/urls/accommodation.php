<form id='newaccommodationf'>
<select name='city'>
	<option value='0'>Выберите город</option>
	<?php
include("../cdb.php");
		$ssscitys = mysql_query("SELECT * FROM city ORDER BY name");
		while ($ssscity = mysql_fetch_array($ssscitys)) {
			echo "<option value='$ssscity[id]'>$ssscity[name]</option>";
		}
	?>
</select><br />
<input type='text' name='name' id='name' placeholder="| Название типа"><br />
<button type='button' onClick='newaccommodation();'>Добавить</button>
</form>

<div class='footercontent'>
<?php
$accommodations = mysql_query("SELECT * FROM accommodation ORDER BY id DESC");
while ($accommodation = mysql_fetch_array($accommodations)) {
	$citys = mysql_query("SELECT * FROM city WHERE id='$accommodation[idCity]'");
	$city = mysql_fetch_array($citys);
	echo "
	<div id='infobl-$accommodation[id]' style='padding: 5px;border-bottom: 1px dashed #505050;'>
		$city[name] - 
		<span id='link-$accommodation[id]'>
			<span id='newname-$accommodation[id]'>$accommodation[name]</span>
			<a onClick="."oprecountry('$accommodation[id]');".">Редактировать</a>
			<a onClick="."delcaccommodation('$accommodation[id]');".">Удалить</a>
		</span>
		<span id='input-$accommodation[id]' style='display: none;'>
			<input type='text' id='rename-$accommodation[id]' value='$accommodation[name]'>
			<a onClick="."reaccommodation('$accommodation[id]');".">Редактировать</a>
		</span>
	</div>";
}
?>
</div>