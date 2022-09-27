<?php

require_once("connectBd.php");

$query = "SELECT lastName, firstName, middleName, post, division FROM users INNER JOIN positions ON positions.id = users.postID INNER JOIN divisions ON divisions.id = positions.idDivision ORDER BY postID"; 

$result = mysqli_query($link, $query);


$sql_div1 = "SELECT COUNT(idDivision) AS sumDiv FROM positions";
	$result1 = mysqli_query($link, $sql_div1) or die( mysqli_error($link) );
	$row_div1 = mysqli_fetch_assoc($result1);

$sql_div2 = "SELECT COUNT(id) AS sumDiv FROM users";
	$result2 = mysqli_query($link, $sql_div2) or die( mysqli_error($link) );
	$row_div2 = mysqli_fetch_assoc($result2);

$procent = round($row_div2['sumDiv'] * 100 / $row_div1['sumDiv'], 2);

echo '<h2>Список сотрудников</h2>';
echo '<p>Всего должностей: '.$row_div1['sumDiv'].'</p>';
echo '<p>Всего работников: '.$row_div2['sumDiv'].'</p>';
echo '<p>Укомплектованность: '.$procent.' %</p>';

echo '<p><a href="index.php">Возврат назад</a></p>';

echo '<table>';
$i=1;
while($row = $result->fetch_assoc()) {
	echo '<tr><td>'.$i.'</td><td>'.$row['lastName'].' '.substr($row['firstName'], 0, 2).'.'.substr($row['middleName'], 0, 2).'.'.'</td><td>'.$row['post'].'</td><td>'.$row['division'].'</td></tr>'; 
	$i++;
}

echo '</table>';
echo '<p><a href="index.php">Возврат назад</a></p>';

?>