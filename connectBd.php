<?php
	$host = 'localhost'; // имя хоста
	$user = 'root';      // имя пользователя
	$pass = '';          // пароль
	$name = 'srvp';      // имя базы данных
	
	$link = mysqli_connect($host, $user, $pass, $name);

	mysqli_query($link, "SET NAMES 'utf8'");
?>