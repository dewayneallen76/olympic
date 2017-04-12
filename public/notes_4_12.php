<?php
// Prepared Statements workflow
// Given any user input like
$username = Input::get('username');
$password = Input::get('password');

// Find any/all queries with dollar sign variables and replace.
$insert = "INSERT INTO users (email, password) VALUES ($email, $password);";
$statement = $connection->exec($insert);

// Step 1, In SQL statements, replace $variable with :variable
$insert = "INSERT INTO users (email, password) VALUES (:email, :password);";

// Step 2, Change any $connection->exec() or $connection->query() methods with ->prepare()
$statement = $connection->prepare($insert);

// Step 3 is to use $statement->bindValue() on each $variable you replaced with :variable syntax
$statement->bindValue(':email', $email, PDO::PARAM_STR);
$statement->bindValue(':password', $password, PDO::PARAM_STR);

// Step 4, run ->execute() on $statement object.
$statement->execute()

// Step 5 is to fetch your results (if your statement was a select)
$parks = $statement->fetchAll(PDO::FETCH_ASSOC);