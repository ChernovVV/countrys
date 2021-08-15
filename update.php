<?php

require_once 'connect.php';
require_once 'pluggabledata.php';

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Обновление данных стран</title>
</head>
<body>
	<h4>Обновление данных стран</h4>
	<form action="update_process.php" method="post">
		<input type="hidden" name="id_for_update" value="<?= $coutry_for_update['id'] ?>">
	<div class="mb-3">
		<label class="form-label">Страна</label>
		<input type="text" class="form-control" name="Country_for_update" value="<?= htmlspecialchars($coutry_for_update['Country']) ?>"  required>
	</div>
	<div class="mb-3">
		<label class="form-label">Столица</label>
		<input type="text" class="form-control" name="Capital_for_update" value="<?= htmlspecialchars($coutry_for_update['Capital']) ?>"  required>
	</div>
	<div class="mb-3">
		<label class="form-label">Население</label>
		<input type="number" class="form-control" name="Population_for_update" value="<?= $coutry_for_update['Population'] ?>"  required>
	</div>
	<div class="mb-3">
		<label class="form-label">Площать страны</label>
		<input type="number" class="form-control" name="Volume_for_update" value="<?= $coutry_for_update['Volume'] ?>"  required>
	</div>
		<button type="submit" class="btn btn-primary" onclick="press_update()">Обновить данные страны</button>
	</form>
</body>
</html>