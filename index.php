<?php 
if (!empty($_POST)) {
	$message = "Вам пришло новое сообщение с сайта: \n " 
	. "Имя отправителя: " . $_POST['name'] . "\n"
	. "Email отправителя: " .  $_POST['email'] . "\n"
	. "Сообщение: \n  " . $_POST['message'];

	$headers = "From: info@hobbyflyrc.ru";

	$resultMail = mail("dasdias@yandex.ru", "Сообщение с сайта", $message, $headers );
	if ( $_POST['name'] != "" && $_POST['email'] != "" ) {	
		if ( $resultMail ) {
			header ("Location: success.php");
			exit();
		} else {
			header ("Location: bad.php");
			exit();
		}	
	} else { 	
		echo '<div id="err-notify" class="error-notify">Имя и Емайл не должны быть пустыми!</div>';
		exit();
	}	
} 
 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Send form</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<form class="form" method="POST" action="index.php">
		<div id="err-notify" class="error-notify">Имя и Емайл не должны быть пустыми!</div>
		<input class="form__input" type="text" name="name" placeholder="Введите Имя">
		<input class="form__input" type="email" name="email" placeholder="Введите Email" >
		<textarea class="form__textarea" name="message" placeholder="Введите сообщение"></textarea>
		<input id="button" class="button" type="submit" name="button" value="Отправить">
	</form>
<script src="libs/jquery-3.3.1.min.js"></script>
</body>
</html>