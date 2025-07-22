<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include("../../app/database/database.php");

$errorMessage = "";
$topics = selectAll("topics");



//  Добавление категории в базу данных

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["topic-create"]))
{
    $name = trim($_POST["name"]);
    $description = trim($_POST["description"]);

    if ($name === "" || $description === "")
    {
        $errorMessage = "Не все поля заполнены!";
    }
    elseif (mb_strlen($name, "UTF-8") < 2)
    {
        $errorMessage = "Категория должна быть более двух символов!";
    }
    else
    {
        $existence = selectOne("topics", ["name" => $name]);
        if ($existence["name"] === $name)
        {
            $errorMessage = "Такая категория уже существует!";
        }
        else
        {
            $topic = [
                "name" => $name,
                "description" => $description
            ];
            $topic_id = insert("topics", $topic);
            $topic = selectOne("topics", ["id" => $topic_id]);
            header("Location: " . BASE_URL . "admin/topics/");
        }
    }
}


//  Редактирование категории

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $id = $_GET["id"];
    $topic = selectOne("topics", ["id" => $id]);

    $id = $topic["id"];
    $name = $topic["name"];
    $description = $topic["description"];
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["topic-edit"]))
{
    //tt($_POST);
    $name = trim($_POST["name"]);
    $description = trim($_POST["description"]);

    if ($name === "" || $description === "")
    {
        $errorMessage = "Не все поля заполнены!";
    }
    elseif (mb_strlen($name, "UTF-8") < 2)
    {
        $errorMessage = "Категория должна быть более двух символов!";
    }
    else
    {
        $existence = selectOne("topics", ["name" => $name]);
        if ($existence["name"] === $name)
        {
            $errorMessage = "Такая категория уже существует!";
        }
        else
        {
            $topic = [
                "name" => $name,
                "description" => $description
            ];
            $topic_id = update("topics", $_POST["id"], $topic);
            header("Location: " . BASE_URL . "admin/topics/");
        }
    }
}


//  Удаление категории

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["del_id"]))
{
    $id = $_GET["del_id"];
    delete("topics", $id);
    header("Location: " . BASE_URL . "admin/topics/");
}