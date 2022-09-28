<?php

require_once("connectBd.php");

$query = "SELECT division, COUNT(idDivision) AS divCount, sum(case when occupied = 1 then 1 else 0 end) as postCount FROM divisions INNER JOIN positions ON positions.idDivision = divisions.id GROUP BY idDivision  ORDER BY divisions.id" ; 

$result = mysqli_query($link, $query);

echo '<h2>Список подразделений</h2>';

echo '<p><a href="index.php">Возврат назад</a></p>';

echo '<table>';
$i=1;
while($row = $result->fetch_assoc()) {
	echo '<tr><td>'.$i.'</td><td>'.$row['division'].'</td><td>'.$row['divCount'].'</td><td>'.$row['postCount'].'</td></tr>'; 
	$i++;
}

echo '</table>';
echo '<p><a href="index.php">Возврат назад</a></p>';

?>