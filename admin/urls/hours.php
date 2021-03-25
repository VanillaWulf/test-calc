<form id='newhourf'>
<input type='number' name='cl' id='name' placeholder="| Введите количество часов"><br />
<select id='city'>
	<option value='0'>Выберите город</option>
	<?php
		include("../cdb.php");
		$citys = mysql_query("SELECT * FROM city ORDER BY id DESC");
		while ($city = mysql_fetch_array($citys)) {
			echo "<option value='$city[id]'>$city[name]</option>";
		}
	?>
</select><br />
<select name='cours' id='cours' style='display: none;'>
	<option value="0">Выберите тип курса</option>
	<?php
		$courss = mysql_query("SELECT * FROM cours ORDER BY id DESC");
		while ($cours = mysql_fetch_array($courss)) {
			echo "<option value='$cours[id]'>$cours[name]</option>";
		}
	?>
</select><br />
<button type='button' onClick='newhour();'>Добавить</button>
</form>

<div class='footercontent'>
<?php
$hourss = mysql_query("SELECT * FROM hours ORDER BY id DESC");
while ($hours = mysql_fetch_array($hourss)) {
	$coursds = mysql_query("SELECT * FROM cours WHERE id='$hours[idCours]'");
	$coursd = mysql_fetch_array($coursds);
	$cityds = mysql_query("SELECT * FROM city WHERE id='$coursd[idCity]'");
	$cityd = mysql_fetch_array($cityds);
	echo "
	<div id='infobl-$hours[id]' style='padding: 5px;border-bottom: 1px dashed #505050;'>
	$cityd[name] - $coursd[name]
		<span id='link-$hours[id]'>
			<span id='newname-$hours[id]'>$hours[cl]</span>
			<a onClick="."oprecountry('$hours[id]');".">Редактировать</a>
			<a onClick="."delhours('$hours[id]');".">Удалить</a>
		</span>
		<span id='input-$hours[id]' style='display: none;'>
			<input type='text' id='rename-$hours[id]' value='$hours[cl]'>
			<a onClick="."rehours('$hours[id]');".">Редактировать</a>
		</span>
	</div>";
}
?>
</div>