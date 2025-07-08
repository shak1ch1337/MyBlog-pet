<?php

$driver = "mysql";
$host = "localhost";
$db_name = "myblog_pet";
$db_username = "root";
$charset = "utf8";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try
{
    $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset",
            $db_username, "", $options);
}
catch (PDOException $e)
{
    die("Ошибка при подключении к базе данных");
}