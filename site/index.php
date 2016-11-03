<?php

try{
	$pdo = new PDO('mysql:dbname=contract_master;host=localhost;charset=utf8mb4;port=3306','root','root');
}catch(PDOException $pe){
	echo $pe->getMessage();
}

$stmt = $pdo->prepare("select * from users");

$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($res, $stmt->errorCode(), $stmt->errorInfo());