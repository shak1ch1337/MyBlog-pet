<?php

require "connect.php";

function tt($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

// Проверка выполнения запроса к базе данных
function databaseCheckError($query)
{
    $errorInfo = $query->errorInfo();
    if ($errorInfo[0] !== PDO::ERR_NONE)
    {
        echo $errorInfo[2];
        exit();
    }
}

// Запрос на получение данных с одной таблицы
function selectAll($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    if (!empty($params))
    {
        $i = 0;
        foreach ($params as $key => $value)
        {
            if (!is_numeric($value))
            {
                $value = "'" . $value . "'";
            }
            if ($i === 0)
            {
                $sql = $sql . " WHERE $key = $value";
            }
            else
            {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    databaseCheckError($query);
    return $query->fetchAll();
}

// Запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    if (!empty($params))
    {
        $i = 0;
        foreach ($params as $key => $value)
        {
            if (!is_numeric($value))
            {
                $value = "'" . $value . "'";
            }
            if ($i === 0)
            {
                $sql = $sql . " WHERE $key = $value";
            }
            else
            {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    databaseCheckError($query);
    return $query->fetch();
}

// Запись в талицу базы данных
function insert($table, $params)
{
    global $pdo;
    $i = 0;
    $columns = "";
    $mask = "";
    foreach ($params as $key => $value)
    {
        if ($key == "password")
        {
            $value = password_hash($value, PASSWORD_BCRYPT);
        }

        if ($key == "admin" && $value == false)
        {
            $value = 0;
        }

        if ($i === 0)
        {
            $columns = $columns . $key;
            $mask = $mask . $value;
        }
        else
        {
            $columns = $columns . ", $key";
            $mask = $mask . ", '$value'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table($columns) VALUES($mask)";

    $query = $pdo->prepare($sql);
    $query->execute();
    databaseCheckError($query);
}

// $arrData = [
//     "admin" => false,
//     "username" => "Oleg",
//     "email" => "Ole23g@test.com",
//     "password" => "sdgsdg"
// ];

// insert("users", $arrData);