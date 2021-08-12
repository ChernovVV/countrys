<?php

$host = 'localhost';
$database = 'x937731t_test';
$user = 'x937731t_test';
$pass = 'Magirus987';

$dsn = "mysql:host=$host;dbname=$database;";
 try { $pdo = new PDO($dsn, $user, $pass);
  
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 } catch (PDOException $e) {

 	die($e->getMessage()); //вывод сообщения ошибки

 }

?>
