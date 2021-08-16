<?php
require_once 'connect.php';

/* начало вывода данных из таблицы */
$coutrys_from_db = $pdo->prepare("SELECT * FROM `Country`"); //берем все данные из таблицы
$coutrys_from_db->execute();
/* конец вывода данных из таблицы */

/* начало получения данных на форму в update*/
$id_for_update = $_GET['id'];

try {

	$coutrys_for_update = $pdo->prepare('SELECT * FROM `Country` WHERE `id`=:id LIMIT 1'); //подготавливаем запрос
	$params = ['id' => $id_for_update]; //подставляем переменные в маску
	$coutrys_for_update->execute($params); //соеденяем переменные с маской
	$coutry_for_update = $coutrys_for_update->fetch(PDO::FETCH_ASSOC); //сортируем массив

} catch (PDOException $e) { //отслеживание ошибок кода вставки данных в БД

    die($e->getMessage());	//вывод сообщения ошибки
}
/* конец получения данных на форму в update*/

?>