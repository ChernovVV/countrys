<?php

require_once 'connect.php';

$id_for_update = $_POST['id_for_update']; //получаем данные из формы
$Country_for_update = $_POST['Country_for_update'];
$Capital_for_update = $_POST['Capital_for_update'];
$Population_for_update = $_POST['Population_for_update'];
$Volume_for_update = $_POST['Volume_for_update'];

$id_for_update = htmlspecialchars($id_for_update); //экранируем HTML теги
$Country_for_update = htmlspecialchars($Country_for_update);
$Capital_for_update = htmlspecialchars($Capital_for_update);
$Population_for_update = htmlspecialchars($Population_for_update);
$Volume_for_update = htmlspecialchars($Volume_for_update);

$sql = $pdo->prepare ('UPDATE Country SET Country=:country, Capital=:capital, Population=:population, Volume=:volume WHERE `id`=:id LIMIT 1'); //подготавливаем запрос
$params = ['id' => $id_for_update, 'country' => $Country_for_update, 'capital' => $Capital_for_update, 'population' => $Population_for_update, 'volume' => $Volume_for_update]; //подставляем переменные в маску
$sql->execute($params); //соеденяем переменные с маской
header('Location: /');