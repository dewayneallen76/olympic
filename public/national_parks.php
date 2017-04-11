<?php 
require __DIR__ .'/db-connection.php';
require __DIR__ .'/input.php';

$limit = 4;
function getLastPage($connection, $limit) {
	$statement = $connection->query("SELECT count(*) from national_parks");
	$count = $statement->fetch()[0];
	$lastPage = ceil($count/$limit);
	return $lastPage;
}

$page = Input::get('page', 1);
if($page <1 || !is_numeric($page)) {
	header("location: national_parks.php?page=1");
}

$offset = ($page - 1) * $limit;
$statement = $connection->query("SELECT * FROM national_parks LIMIT $limit OFFSET $offset");
$parks = $statement->fetchAll(PDO::FETCH_ASSOC);
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
		 <a href="$page"></a>
		 <a href=""></a>
	</div>
</body>