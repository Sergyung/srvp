<?php
	session_start();

	require 'connectBd.php';
			
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редактирование подразделений</title>
</head>
<body>
	<form action="addDivision.php" method="post">
		<p>
			<label>Подразделение</label>
			<input type="text" name="division">
		</p>
		<p>
			<!-- <input type="button" name="button" > -->
			<input type="submit" name="enter_ship" value="Записать">
		</p>
	</form>
	<p><a href="adminPanel.php">Возврат назад</a></p>

	<br>
		<div class="list_auto"> 
		<div class="autos">
		<table>	
			<?php
				$sql_div = "SELECT division FROM divisions";
				$result = mysqli_query($link, $sql_div) or die( mysqli_error($link) );
				$i = 1;			
				while ($row_division = mysqli_fetch_assoc($result)) {
					echo '<tr><td>'.$i.'</td><td><a href = "#">'.$row_division['division'].'</a></td></tr>';
				$i++;
				}
			?>
		</table>
		</div>
</body>
</html>

