<?php
	session_start();

	require 'connectBd.php';
			
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редактирование сотрудников</title>
</head>

<script src="jquery.main.js"></script>

<script>
    function getPost(val){
        $.ajax({
            type: "POST",
            url: "getPost.php",
            data: 'division_id='+val,
            success: function(data){
                $("#post-list").html(data);
            }
        });
    }
</script>

<body>
	<form action="addUser.php" method="post">
		<p>
			<label>Фамилия</label>
			<input type="text" name="lastName">
		</p>
		<p>
			<label>Имя</label>
			<input type="text" name="firstName">
		</p>
		<p>
			<label>Отчество</label>
			<input type="text" name="middleName">
		</p>
			<label>Подразделение</label>
			<select name="division" id="division-list" onchange="getPost(this.value);">
                <option value disabled selected>Выбери лодразделение</option>
                <?php
                	$query = "SELECT * FROM divisions"; // запрос на выборку
					$result = mysqli_query($link, $query);
					 
					while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
					{
					    echo '<option value ='.$row['id'].'>'.$row['division'].'</option>';// выводим данные
					}
				?>
			</select>
		<p>
		<p>
			<label>Должность</label>
            <select name="state" id="post-list">
                <option value="">Выберите должность</option>
            </select>
		</p>	

			<input type="submit" name="enter_ship" value="Записать">
		</p>
	</form>
	<p><a href="adminPanel.php">Возврат назад</a></p>

	<br>
		
</body>
</html>