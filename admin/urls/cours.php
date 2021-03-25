<form id='newcoursf'>
<input type='text' name='name' id='name' placeholder="| Введите название курса"><br />
<select name='city'>
	<option value='0'>Выберите город</option>
	<?php
		include("../cdb.php");
		$citys = mysql_query("SELECT * FROM city ORDER BY id DESC");
		while ($city = mysql_fetch_array($citys)) {
			echo "<option value='$city[id]'>$city[name]</option>";
		}
	?>
</select><br />
<button type='button' onClick='newcours();'>Добавить</button>
</form>

<div class='footercontent'>
<?php
$courss = mysql_query("SELECT * FROM cours ORDER BY id DESC");
while ($cours = mysql_fetch_array($courss)) {
	$citysv = mysql_query("SELECT * FROM city WHERE id='$cours[idCity]'");
	$cityv = mysql_fetch_array($citysv);
	echo "
	<div id='infobl-$cours[id]' style='padding: 5px;border-bottom: 1px dashed #505050;'>
		$cityv[name] - 
		<span id='link-$cours[id]'>
			<span id='newname-$cours[id]'>$cours[name]</span>
			<a onClick="."oprecountry('$cours[id]');".">Редактировать</a>
			<a onClick="."delcours('$cours[id]');".">Удалить</a>
		</span>
		<span id='input-$cours[id]' style='display: none;'>
			<input type='text' id='rename-$cours[id]' value='$cours[name]'>
			<a onClick="."recours('$cours[id]');".">Редактировать</a>
		</span>
	</div>";
}
?>
</div>