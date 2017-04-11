<?php 
require __DIR__ .'/db-connection.php';

$page = 1;
$limit = 4;
$offset = (isset($_GET['page'])) ? (($_GET['page'] -1) * $limit) : 0;
$parks = $connection->query("SELECT * FROM national_parks LIMIT {$limit} OFFSET {$offset}");

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>National Parks</title>
</head>

<body>
	<div class="container-fluid">
		<h1 class="text-center">National Parks</h1>
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Location</th>
					<th>Date Established</th>
					<th>Area in Acres</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody> 
		<!-- PHP FOR EACH LOOP TO ADD EACH PARK AND ITS INFORMATION INTO TABLE -->
				<?php foreach ($parks as $park): ?>
				<tr>
					<td><?= $park['id']; ?></td>
					<td><?= $park['name']; ?></td>
					<td><?= $park['location']; ?></td>
					<td><?= $park['date_established']; ?></td>
					<td><?= number_format($park['area_in_acres']); ?></td>
					<td><?= $park['description']; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<a href="">Previous</a>
		<a href="">Next</a>
	</div>
</body>