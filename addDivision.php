<?php
	session_start();
	require 'connectBd.php';

	if (!empty($_POST[division])) {
		$division = htmlspecialchars($_POST['division']);
	} else {
		die('Вы забыли ввести название подразделения. <a href="pageDivision.php">Вернуться назад</a>');
	}

	$query = "INSERT INTO divisions (division) VALUES('$division')";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
	if (isset($result)) {
		echo '<h4>Запрос на добавление судна в базу данных прошел. <a href="pageAddDivision.php">Вернуться</a></h4>';
	}
		
?>