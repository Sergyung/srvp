<?php

	session_start();

	require 'connectBd.php';

	if (!empty($_POST['lastName'])) {
		$lastName = htmlspecialchars($_POST['lastName']);
	} else {
		die('Вы забыли ввести фамилию. <a href="pageUser.php">Вернуться на предыдущую страницу</a>');
	}

	if (!empty($_POST['firstName'])) {
		$firstName = htmlspecialchars($_POST['firstName']);
	} else {
		die('Вы забыли ввести имя. <a href="pageUser.php">Вернуться на предыдущую страницу</a>');
	}

	if (!empty($_POST['middleName'])) {
		$middleName = htmlspecialchars($_POST['middleName']);
	} else {
		die('Вы забыли ввести отчество. <a href="pageUser.php">Вернуться на предыдущую страницу</a>');
	}

	$dateBirth = $_POST['dateBirth'];
	$dateJob = $_POST['dateJob'];
	$datePost = $_POST['datePost'];

	$idPost = ($_POST['posts']);

	$sql_user = "INSERT INTO users (lastName, firstName, middleName, dataBirth, dataJob, dataPost, postID)  VALUES ('$lastName','$firstName', '$middleName', '$dateBirth', '$dateJob', '$datePost', '$idPost')";

	$result = mysqli_query($link, $sql_user) or die( mysqli_error($link) );

	$sql_post = "UPDATE `positions` SET `occupied` = '1' WHERE `positions`.`id` = $idPost;";
	$result1 = mysqli_query($link, $sql_post) or die( mysqli_error($link) );

	if (isset($result)) {
		echo '<h4>Запрос на добавление должности в базу данных прошел. <a href="pageUser.php">Вернуться на предыдущую страницу</a></h4>';
	}

?>