<?php

require_once 'connect.php';

$Country_create = $_POST['Country_create']; //принимает переменные с формы
$Capital_create = $_POST['Capital_create'];
$Population_create = $_POST['Population_create'];
$Volume_create = $_POST['Volume_create'];

$Country_create = htmlspecialchars($Country_create); //экранируем html теги
$Capital_create = htmlspecialchars($Capital_create);
$Population_create = htmlspecialchars($Population_create);
$Volume_create = htmlspecialchars($Volume_create);

try {

	$sql = $pdo->prepare ("INSERT INTO Country SET Country=:country, Capital=:capital, Population=:population, Volume=:volume"); //подготавливаем запрос
	$params = ['country' => $Country_create, 'capital' => $Capital_create, 'population' => $Population_create, 'volume' => $Volume_create]; //подставляем переменные в маску
	$sql->execute($params); //соеденяем переменные с маской

} catch (PDOException $e) { //отслеживание ошибок кода вставки данных в БД

	die($e->getMessage()); //вывод сообщения ошибки
}

header('location: / ');
?>