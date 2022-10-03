<?php
include 'classes/DB.php';
session_start();

DB::connect();
$query = DB::query("
	SELECT *
	FROM users
");

while($row = DB::fetch($query)){
	var_dump($row);
}