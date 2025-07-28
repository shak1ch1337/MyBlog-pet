<?php

session_start();

require "connect.php";

// Функция для тестирования
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
        if ($key == "admin" && $value == false)
        {
            $value = 0;
        }

        if ($i === 0)
        {
            $columns = $columns . "$key";
            $mask = $mask . "'" . "$value" . "'";
        }
        else
        {
            $columns = $columns . ", $key";
            $mask = $mask . ", '$value'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table($columns) VALUES($mask)";
    tt($sql);
    $query = $pdo->prepare($sql);
    $query->execute();
    databaseCheckError($query);
    return $pdo->lastInsertId();
}

// Обновление записи в базе данных
function update($table, $id, $params)
{
    global $pdo;
    $i = 0;
    $str = "";
    foreach ($params as $key => $value)
    {
        if ($i === 0)
        {
            $str = $str . $key . " = " . "'$value'";   
        }
        else
        {
            $str = $str . ", " . $key . " = " . "'$value'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET " . $str . " WHERE id = " . $id;


    $query = $pdo->prepare($sql);
    $query->execute();
    databaseCheckError($query);
}


// Удаление записи из базы данных
function delete($table, $id)
{
    global $pdo;
    $sql = "DELETE FROM $table WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    databaseCheckError($query);
}

// Выборка записей (постов) с автором в админ-панеле

function selectAllFromPostsWithUsers($table1, $table2)
{
    global $pdo;
    $sql = "SELECT
    t1.id,
    t1.title,
    t1.img,
    t1.content,
    t1.status,
    t1.id_topic,
    t1.create_date,
    t2.username
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    databaseCheckError($query);
    return $query->fetchAll();
}

function selectAllFromPostsWithUserOnIndex($table1, $table2)
{
    global $pdo;
    $sql = "SELECT post.*, user.username FROM $table1 AS post JOIN $table2 AS user ON post.id_user = user.id WHERE post.status = 1 ORDER BY post.id DESC";
    $query = $pdo->prepare($sql);
    $query->execute();
    databaseCheckError($query);
    return $query->fetchAll();
}

function selectTopPostsFromPostsWithUserOnIndex($table1)
{
    global $pdo;
    $sql = "SELECT * FROM $table1 WHERE id_topic = 15";
    $query = $pdo->prepare($sql);
    $query->execute();
    databaseCheckError($query);
    return $query->fetchAll();
}

//  Поиск по заголовкам и содержимому (приметивный)
function searchInTitleAndContent($term, $table1, $table2)
{
    $term = trim(strip_tags(stripcslashes(htmlspecialchars($term))));
    global $pdo;
    $sql = "SELECT 
    post.*, user.username 
    FROM $table1 AS post 
    JOIN $table2 AS user 
    ON post.id_user = user.id 
    WHERE post.status = 1 
    AND post.title LIKE '%$term%'";
    // tt($term);
    $query = $pdo->prepare($sql);
    $query->execute();
    databaseCheckError($query);
    return $query->fetchAll();
}

//  Выбор поста с автором для сигн
function selectPostFromPostsWithUserOnSign($table1, $table2, $id)
{
    global $pdo;
    $sql = "SELECT post.*, user.username FROM $table1 AS post JOIN $table2 AS user ON post.id_user = user.id WHERE post.id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    databaseCheckError($query);
    return $query->fetch();
}