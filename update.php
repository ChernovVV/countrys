<?php
require_once 'connect.php';

$id = $_GET['id'];

$id = htmlspecialchars($id); //экранируем HTML теги

try {

	$coutrys = $pdo->prepare('SELECT * FROM `Country` WHERE `id`=:id LIMIT 1'); //подготавливаем запрос
	$params = ['id' => $id]; //подставляем переменные в маску
	$coutrys->execute($params); //соеденяем переменные с маской
	$coutry = $coutrys->fetch(PDO::FETCH_ASSOC); //сортируем массив

} catch (PDOException $e) { //отслеживание ошибок кода вставки данных в БД

    die($e->getMessage());	//вывод сообщения ошибки
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Обновление данных стран</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="script.js"></script>
        <h4>Обновление данных стран</h4>
        <form action="update_process.php" method="post">
          <input type="hidden" name="id" value="<?= $coutry['id'] ?>">
          <div class="mb-3">
            <label class="form-label">Страна</label>
            <input type="text" class="form-control" name="Country" value="<?= $coutry['Country'] ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Столица</label>
            <input type="text" class="form-control" name="Capital" value="<?= $coutry['Capital'] ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Население</label>
            <input type="number" class="form-control" name="Population" value="<?= $coutry['Population'] ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Площать страны</label>
            <input type="number" class="form-control" name="Volume" value="<?= $coutry['Volume'] ?>">
          </div>
            <button type="submit" class="btn btn-primary" onclick="press_update()">Обновить данные страны</button>
          </div>
        </form>
</body>
</html>