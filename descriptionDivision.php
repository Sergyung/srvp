<?php

require_once("connectBd.php");

$divi = $_GET['divi'];

$query1 = "SELECT division FROM divisions WHERE id = '$divi'" ; 

$result1 = mysqli_query($link, $query1);
$row1 = $result1->fetch_assoc();
//$row = mysqli_fetch_assoc($result);
echo '<h2>'.$row1['division'].'</h2>';

$query = "SELECT post FROM positions WHERE idDivision = '$divi'" ; 

$result = mysqli_query($link, $query);
echo '<table>';
//echo '<tr><th>№ п/п</th><th>Название подразделения</th><th>Всего должностей</th><th>Занято должностей</th></tr>'; 
$i=1;
while($row = $result->fetch_assoc()) {
	echo '<tr><td>'.$i.'</td><td>'.$row['post'].'</td></tr>'; 
 	$i++;
}

echo '</table>';
echo '<p><a href="listDivisions.php">Возврат назад</a></p>';

?>