<?php

require_once 'connect.php';

$id = $_GET['id'];

$id = htmlspecialchars($id);

try {

	$sql = $pdo->prepare("DELETE FROM Country WHERE id=:countryId"); //подготавливаем запрос
	$params = ['countryId' => $id]; //подставляем переменные в маску
	$sql->execute($params); //соеденяем переменные с маской

} catch (PDOException $e) { //отслеживание ошибок кода вставки данных в БД

	die($e->getMessage());	//вывод сообщения ошибки
}
header('Location: /');