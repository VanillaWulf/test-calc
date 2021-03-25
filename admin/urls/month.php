<form id='newmonthf'>
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
<select id='cours' style='display: none;'>
	<option value='0'>Выберите тип курса</option>
</select><br />
<select id='hours' style='display: none;'>
	<option value='0'>Выберите кол-во часов</option>
</select><br />

<div id='month'>
	<div class='inpbl'>
		<input type='number' id='name' data-items='1' placeholder="| Количество недель">
		<input type='number' class='sum' id='sum-1' placeholder="| Цена">
	</div>
</div>
<div id="itemsdatavar" style="display: none;">1</div>
<button type='button' onClick='plustabmonth();'>+</button><br />
<button type='button' onClick='newmonth();'>Добавить</button>
</form>


<div class='footercontent'>
<?php
$months = mysql_query("SELECT * FROM month ORDER BY id DESC");
while ($month = mysql_fetch_array($months)) {
	$hoursds = mysql_query("SELECT * FROM hours WHERE id='$month[idHours]'");
	$hoursd = mysql_fetch_array($hoursds);
	$coursds = mysql_query("SELECT * FROM cours WHERE id='$hoursd[idCours]'");
	$coursd = mysql_fetch_array($coursds);
	$cityds = mysql_query("SELECT * FROM city WHERE id='$coursd[idCity]'");
	$cityd = mysql_fetch_array($cityds);
	echo "
	<div id='infobl-$month[id]' style='padding: 5px;border-bottom: 1px dashed #505050;'>
		$cityd[name] - $coursd[name] - $hoursd[cl] часов
		<span id='link-$month[id]'>
			<span id='newname-$month[id]'>$month[cl] ($month[sum])</span>
			<a onClick="."oprecountry('$month[id]');".">Редактировать</a>
			<a onClick="."delmonth('$month[id]');".">Удалить</a>
		</span>
		<span id='input-$month[id]' style='display: none;'>
			<input type='text' id='rename-$month[id]' value='$month[cl]'>
			<input type='nubmer' id='resum-$month[id]' value='$month[sum]'>
			<a onClick="."remonth('$month[id]');".">Редактировать</a>
		</span>
	</div>";
}
?>
</div>