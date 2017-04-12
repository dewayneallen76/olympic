<?php  

// connect to db, present db connection as $connection variable
require __DIR__ . '/db-connection.php';
require __DIR__ . '/Input.php';

// protect from looking at blank pages past the number of results
# of results / limit to get number of total pages, round up
function getLastPage($connection, $limit) {
	$statement = $connection->query("SELECT count(*) from national_parks");
	$count = $statement->fetch()[0]; // to get the count
	$lastPage = ceil($count / $limit);
	return $lastPage;
}

function getPaginatedParks($connection, $page, $limit) {
	// offset = (pageNumber -1) * limit
	$offset = ($page - 1) * $limit;

	$select = "SELECT * from national_parks limit $limit offset $offset";
	$statement = $connection->prepare($select);
	// Update the query(s) in national_parks.php to use prepared statements, in particular for the limit and offset.
	$statement->bindValue(':offset', $offset, PDO::PARAM_INT);
	$statement->bindValue(':limit', $limit, PDO::PARAM_INT);
	$statement->execute();
	return $statement->fetchAll(PDO::FETCH_ASSOC); 
}

function handleOutOfRangeRequests($page, $lastPage) {
	// protect from looking at negative pages, too high pages, and non-numeric pages
	if($page < 1 || !is_numeric($page)) {
		header("location: national_parks.php?page=1");
		die;
	} else if($page > $lastPage) {
		header("location: national_parks.php?page=$lastPage");
		die;
	}
}

function pageController($connection) {

	$data = [];
	
	$limit = 4;
	$page = Input::get('page', 1);

	$lastPage = getLastPage($connection, $limit);

	handleOutOfRangeRequests($page, $lastPage);

	$data['parks'] = getPaginatedParks($connection, $page, $limit);
	$data['page'] = $page;
	$data['lastPage'] = $lastPage;

	return $data;
}

extract(pageController($connection));



?>
<!DOCTYPE html>
	<html lang="en-us">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="x-ua-compatible" content="ie=edge">
		
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta name="description" content="">
		<meta name="Keywords" content="">
	    <meta name="author" content="">
		<title></title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<!-- Custom CSS -->
	<style></style>
	</head>
	<body>
		<main class="container">
			<h1>Welcome to National Parks</h1>

			<section class="parks">
				<table class="table table-striped">
					<tr>
						<th>Park Name: </th>
						<th>Location: </th>
						<th>Area in Acres: </th>
						<th>Date Established: </th>
						<th>Description: </th>
					</tr>
					<?php foreach($parks as $park): ?>
						<tr>
							<td><?= $park['name'] ?></td>
							<td><?= $park['location'] ?></td>
							<td><?= $park['area_in_acres']?></td>
							<td><?= $park['date_established']?></td>
							<td><?= $park['description']?></td>
						</tr>
					<?php endforeach; ?>	
				</table>

				<?php if($page > 1): ?>
					<a href="?page=<?= $page - 1 ?>"><span class="glyphicon glyphicon-chevron-left">Previous</span></a>
				<?php endif; ?>
				
				<?php if($page < $lastPage): ?>	
					<a class="pull-right" href="?page=<?= $page + 1 ?>"><span class="glyphicon glyphicon-chevron-right">Next</span></a>
				<?php endif; ?>

			</section>
			<h1>Add A Park</h1>
			<form method="post">
  				<div class="form-group">
    				<label for="name">Park Name</label>
    				<input type="text" class="form-control" name="name" placeholder="Park Name">
  				</div>
  				<div class="form-group">
    				<label for="location">Location</label>
    				<input type="text" class="form-control" name="location" placeholder="Location">
  				</div>
  				<div class="form-group">
    				<label for="area_in_acres">Area in Acres</label>
    				<input type="number" class="form-control" name="area_in_acres" placeholder="Area in Acres">
  				</div>
  				<div class="form-group">
    				<label for="date_establ">Date Established</label>
    				<input type="text" class="form-control" name="date_established" placeholder="Date Established">
  				</div>
  				<div class="form-group">
    				<label for="description">Description</label>
    				<input type="text" class="form-control" name="description" placeholder="Description">
  				</div>
  				<input type="submit" class="btn btn-default" value="Submit"></input>
			</form>
		</main>

		<!-- minified jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
		<!-- Your custom JS goes here -->
		<script type="text/javascript"></script>
	</body>
	</html>
	
