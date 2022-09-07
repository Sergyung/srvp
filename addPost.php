<?php

	session_start();

	require 'connectBd.php';

	if (!empty($_POST['posts'])) {
		$posts = htmlspecialchars($_POST['posts']);
	} else {
		die('Вы забыли ввести название должности. <a href="pagePost.php">Вернуться на предыдущую страницу</a>');

	}

	$idDivision = ($_POST['idDivision']);

	$sql_ship = "INSERT INTO positions (post, idDivision)  VALUES ('$posts','$idDivision')";

	$result = mysqli_query($link, $sql_ship) or die( mysqli_error($link) );

	if (isset($result)) {
		echo '<h4>Запрос на добавление должности в базу данных прошел. <a href="pagePost.php">Вернуться на предыдущую страницу</a></h4>';
	}

?>