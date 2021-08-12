<?php
require_once 'connect.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Список стран</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="script.js"></script>
	<div class="container">
		<div class="row">
	    	<div class="col align-self-center">
				<table class="table table-bordered border-primary table-sm">
				 	 <thead>
						<tr class="table-success">
				   		   <th scope="col">Страна</th>
				  		   <th scope="col">Столица</th>
				  		   <th scope="col">Население</th>
				  		   <th scope="col">Площать страны</th>
				  		</tr>
				  	</thead>
						<?php
						$coutrys = $pdo->prepare("SELECT * FROM `Country`"); //берем все данные из таблицы
						$coutrys->execute();
						while ($coutry = $coutrys->fetch(PDO::FETCH_ASSOC)) //сортируем данные
						{?>
					<tbody>
						<tr>
							<td class="table-secondary"><?= $coutry['Country'] ?></td>
							<td class="table-secondary"><?= $coutry['Capital'] ?></td>
							<td class="table-secondary"><?= $coutry['Population'] = number_format($coutry['Population'], 0, ',', ' ') ?> человек</td>
							<td class="table-secondary"><?= $coutry['Volume'] = number_format($coutry['Volume'], 0, ',', ' ') ?> км<sup>2</sup></td>
							<td><button type="button" class="btn btn-outline-primary" onclick="document.location='update.php?id=<?= $coutry['id'] ?>'">Обновить</a></td>
							<td><button type="button" class="btn btn-outline-danger" onclick="document.location='delete.php?id=<?= $coutry['id'] ?>'">Удалить</button></td>
						</tr>
					</tbody>
						<?php
						}
						?>
				</table>
				<h4>Добавить новую страну</h4>
				<form action="create_process.php" method="post">
					<div class="mb-3">
						<label class="form-label">Страна</label>
						<input type="text" class="form-control" name="Country">
					</div>
					<div class="mb-3">
						<label class="form-label">Столица</label>
						<input type="text" class="form-control" name="Capital">
					</div>
					<div class="mb-3">
						<label class="form-label">Население</label>
						<input type="number" class="form-control" name="Population">
					</div>
					<div class="mb-3">
						<label class="form-label">Площать страны</label>
						<input type="number" class="form-control" name="Volume">
					</div>
						<button type="submit" class="btn btn-primary" onclick="press_create()">Добавить новую страну</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
