<?php
try {
    $dsn = 'mysql:host=db;dbname=quiz;charset=utf8';
    $user = 'root';
    $password = 'password';
    $db = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    echo ('接続失敗');
    exit();
}
