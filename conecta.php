<?php
define("BASE", "http://localhost/gazin/");
$server = "localhost";
$dbname = "dev";
$user = "root";
$password = "";

global $pdo;

try {
	$pdo = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8",$user,$password);
} catch (PDOException $erro) {
	echo $erro->getMessage();
	exit;
}