<?php

require_once 'connect.php';

$Country = $_POST['Country']; //принимает переменные с формы
$Capital = $_POST['Capital'];
$Population = $_POST['Population'];
$Volume = $_POST['Volume'];

$Country = htmlspecialchars($Country); //экранируем html теги
$Capital = htmlspecialchars($Capital);
$Population = htmlspecialchars($Population);
$Volume = htmlspecialchars($Volume);

try {

	$sql = $pdo->prepare ("INSERT INTO Country SET Country=:country, Capital=:capital, Population=:population, Volume=:volume"); //подготавливаем запрос
	$params = ['country' => $Country, 'capital' => $Capital, 'population' => $Population, 'volume' => $Volume]; //подставляем переменные в маску
	$sql->execute($params); //соеденяем переменные с маской

} catch (PDOException $e) { //отслеживание ошибок кода вставки данных в БД

	die($e->getMessage()); //вывод сообщения ошибки
}

header('location: / ');
?>