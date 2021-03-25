<form id='newhouraccommodationf'>
<select name='accommodation'>
	<option value='0'>Выберите тип</option>
	<?php
include("../cdb.php");
		$ssscitys = mysql_query("SELECT * FROM accommodation ORDER BY name");
		while ($ssscity = mysql_fetch_array($ssscitys)) {
			$infcitys = mysql_fetch_array(mysql_query("SELECT * FROM city WHERE id='$ssscity[idCity]'"));
			echo "<option value='$ssscity[id]'>$infcitys[name] - $ssscity[name]</option>";
		}
	?>
</select><br />
<input type='text' name='name' id='name' placeholder="| Кол-во недель"><br />
<input type='text' name='sum' id='sum' placeholder="| Стоимость"><br />
<button type='button' onClick='newhouraccommodation();'>Добавить</button>
</form>

<div class='footercontent'>
<?php
$houraccommodations = mysql_query("SELECT * FROM houraccommodation ORDER BY id DESC");
while ($houraccommodation = mysql_fetch_array($houraccommodations)) {
	$citys = mysql_query("SELECT * FROM accommodation a, city c WHERE a.id='$houraccommodation[idAccommodation]' AND a.idCity = c.id");
	$city = mysql_fetch_array($citys);
	$accommodations = mysql_query("SELECT * FROM accommodation WHERE id='$houraccommodation[idAccommodation]'");
	$accommodation = mysql_fetch_array($accommodations);
	echo "
	<div id='infobl-$houraccommodation[id]' style='padding: 5px;border-bottom: 1px dashed #505050;'>
		<span id='link-$houraccommodation[id]'>$city[name] - $accommodation[name] -  
			<span id='newname-$houraccommodation[id]'>$houraccommodation[cl] - $houraccommodation[sum]</span>
			<a onClick="."oprecountry('$houraccommodation[id]');".">Редактировать</a>
			<a onClick="."delhouraccommodation('$houraccommodation[id]');".">Удалить</a>
		</span>
		<span id='input-$houraccommodation[id]' style='display: none;'>
			<input type='text' id='rename-$houraccommodation[id]' value='$houraccommodation[cl]'>
			<input type='text' id='resum-$houraccommodation[id]' value='$houraccommodation[sum]'>
			<a onClick="."rehouraccommodation('$houraccommodation[id]');".">Редактировать</a>
		</span>
	</div>";
}
?>
</div>