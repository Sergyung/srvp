<?php
require_once("connectBd.php");

if (!empty($_POST["division_id"])) {

	$query = "SELECT * FROM positions WHERE idDivision = '".$_POST["division_id"]."' AND occupied = '0'"; // запрос на выборку
	$result = mysqli_query($link, $query);
	echo '<option value disabled selected>Выберите должность</option> ';
	while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
	{
	    echo '<option value ='.$row['id'].'>'.$row['post'].'</option>';// выводим данные
	}

}
?>