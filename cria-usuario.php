<?php 

declare(strict_types=1);

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$email = $argv[1];
$password = $argv[2];
$hash = password_hash($password, PASSWORD_ARGON2ID);

$sql = 'INSERT INTO users (email, password) VALUES(?, ?);';
$statement = $pdo->prepare($sql);
$statement->bindVAlue(1, $email);
$statement->bindVAlue(2, $hash);
$statement->execute();