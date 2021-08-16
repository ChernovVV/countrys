<?php

require_once 'connect.php';

$id = $_POST['id']; //получаем данные из формы
$Country = $_POST['Country'];
$Capital = $_POST['Capital'];
$Population = $_POST['Population'];
$Volume = $_POST['Volume'];

$id = htmlspecialchars($id); //экранируем HTML теги
$Country = htmlspecialchars($Country);
$Capital = htmlspecialchars($Capital);
$Population = htmlspecialchars($Population);
$Volume = htmlspecialchars($Volume);

$sql = $pdo->prepare ('UPDATE Country SET Country=:country, Capital=:capital, Population=:population, Volume=:volume WHERE `id`=:id LIMIT 1'); //подготавливаем запрос
$params = ['id' => $id, 'country' => $Country, 'capital' => $Capital, 'population' => $Population, 'volume' => $Volume]; //подставляем переменные в маску
$sql->execute($params); //соеденяем переменные с маской
header('Location: /');