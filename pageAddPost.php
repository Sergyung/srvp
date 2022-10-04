<?php
	session_start();

	require 'connectBd.php';
			
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редактирование должностей</title>
</head>
<body>
	<form action="addPost.php" method="post">
		<p>
			<label>Должность</label>
			<input type="text" name="posts">
		</p>
			<label>Подразделение</label>
			<select name="idDivision">
	        	<option></option>
	        	<?php
	        		$query = "SELECT * FROM divisions"; 
					$result = mysqli_query($link, $query);
					 
					while($row = $result->fetch_assoc())
					{
					    echo '<option value ='.$row['id'].'>'.$row['division'].'</option>';
					}
				?>
			</select>
		<p>
			
			<input type="submit" name="enter_ship" value="Записать">
		</p>
	</form>
	<p><a href="adminPanel.php">Возврат назад</a></p>

	<br>
		<div class="list_auto"> 
		<div class="autos">
		<table>	
			<?php
				$sql_div = "SELECT division, COUNT(*) AS countDiv FROM divisions INNER JOIN positions ON positions.idDivision = divisions.id GROUP BY idDivision";
				$result = mysqli_query($link, $sql_div) or die( mysqli_error($link) );
				$i = 1;			
				while ($row_div = mysqli_fetch_assoc($result)) {
					echo '<tr><td>'.$i.'</td><td><a href = "#">'.$row_div['division'].'</a></td><td>'.$row_div['countDiv'].'</td></tr>';
				$i++;
				}
				$sql_div1 = "SELECT COUNT(idDivision) AS sumDiv FROM positions";
				$result1 = mysqli_query($link, $sql_div1) or die( mysqli_error($link) );
				$row_div1 = mysqli_fetch_assoc($result1);
				echo '<tr><td colspan="2">Итого</td><td>'.$row_div1['sumDiv'].'</td></tr>';
			?> 
		</table>
		</div>
</body>
</html>