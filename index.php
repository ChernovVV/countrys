<?php

require_once 'connect.php';
require_once 'pluggabledata.php';
require_once 'htmlsample.php';

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Список стран</title>
</head>
<body>
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
						while ($coutry_from_db = $coutrys_function_from->fetch(PDO::FETCH_ASSOC)) //сортируем данные
						{?>
					<tbody>
						<tr>
							<td class="table-secondary"><?= htmlspecialchars($coutry_from_db['Country']) ?></td>
							<td class="table-secondary"><?= htmlspecialchars($coutry_from_db['Capital']) ?></td>
							<td class="table-secondary"><?= $coutry_from_db['Population'] = number_format($coutry_from_db['Population'], 0, ',', ' ') ?> человек</td>
							<td class="table-secondary"><?= $coutry_from_db['Volume'] = number_format($coutry_from_db['Volume'], 0, ',', ' ') ?> км<sup>2</sup></td>
							<td><button type="button" class="btn btn-outline-primary box-btn" onclick="document.location='update.php?id=<?= $coutry_from_db['id'] ?>'">Обновить</a></td>
							<td><button type="button" class="btn btn-outline-danger" onclick="document.location='delete.php?id=<?= $coutry_from_db['id'] ?>'">Удалить</button></td>
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
						<input type="text" class="form-control" name="Country" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Столица</label>
						<input type="text" class="form-control" name="Capital" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Население</label>
						<input type="number" class="form-control" name="Population" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Площать страны</label>
						<input type="number" class="form-control" name="Volume" required>
					</div>
						<button type="submit" class="kastom-btn" onclick="press_create()">Добавить новую страну</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
