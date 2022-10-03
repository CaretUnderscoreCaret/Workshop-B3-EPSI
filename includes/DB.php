<?php

echo '<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>';
$error=array();
$current_user=array();
session_start();

$DBhost  = "woaffrrflavien.mysql.db";
$DBowner = "woaffrrflavien";
$DBpw    = "123soleilLune";
$DBName  = $DBowner;
$DBPort = '';
if ($DBPort == ""){
    $DBconnect = "mysql:dbname=".$DBName.";host=".$DBhost;
}else{
    $DBconnect = "mysql:dbname=".$DBName.";host=".$DBhost.";port=".$DBPort;
}
try{
    $db = new PDO($DBconnect, $DBowner, $DBpw);
}catch (PDOException $e){   
    $error['DB_CONNECTION_ERROR']=$e->getMessage();
    echo 'prout';
}

$user_query = $db->query("
        SELECT u.user_id,u.email,name
        FROM users u
    ");
$user = $user_query->fetch();
var_dump($user);