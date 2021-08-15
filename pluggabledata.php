<?php
require_once 'connect.php';

/* начало вывода данных из таблицы */
$coutrys_from_db = $pdo->prepare("SELECT * FROM `Country`"); //берем все данные из таблицы
$coutrys_from_db->execute();
/* конец вывода данных из таблицы */

/* начало получения данных на форму в update*/
$id_for_update = $_GET['id'];

$id_for_update = htmlspecialchars($id_for_update); //экранируем HTML теги

try {

	$coutrys_for_update = $pdo->prepare('SELECT * FROM `Country` WHERE `id`=:id LIMIT 1'); //подготавливаем запрос
	$params_for_update = ['id' => $id_for_update]; //подставляем переменные в маску
	$coutrys_for_update->execute($params_for_update); //соеденяем переменные с маской
	$coutry_for_update = $coutrys_for_update->fetch(PDO::FETCH_ASSOC); //сортируем массив

} catch (PDOException $e) { //отслеживание ошибок кода вставки данных в БД

    die($e->getMessage());	//вывод сообщения ошибки
}
/* конец получения данных на форму в update*/
?>
<html>
<head>
	<meta charset="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="script.js"></script>
</body>
</html>