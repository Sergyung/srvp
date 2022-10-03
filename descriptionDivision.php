<?php

require_once("connectBd.php");

$divi = $_GET['divi'];

$query1 = "SELECT division FROM divisions WHERE id = '$divi'" ; 

$result1 = mysqli_query($link, $query1);
$row1 = $result1->fetch_assoc();
//$row = mysqli_fetch_assoc($result);
echo '<h2>'.$row1['division'].'</h2>';

$query = "SELECT post, lastName FROM positions LEFT JOIN users ON users.postID = positions.id WHERE idDivision = '$divi' ORDER BY positions.id" ; 

$result = mysqli_query($link, $query);
echo '<table border="1">';
echo '<tr><th>№<br>п/п</th><th>Название должности</th><th>Фамилия<br> и инициалы</th></tr>'; 
$i=1;
while($row = $result->fetch_assoc()) {
	echo '<tr><td>'.$i.'</td><td>'.$row['post'].'</td><td>'.$row['lastName'].'</td></tr>'; 
 	$i++;
}

echo '</table>';
echo '<p><a href="listDivisions.php">Возврат назад</a></p>';

?>