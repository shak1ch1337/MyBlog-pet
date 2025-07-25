<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include(SITE_ROOT . "/app/database/database.php");

$errorMessage = "";
$topics = selectAll("topics");
$posts = selectAll("posts");
$postsAdm = selectAllFromPostsWithUsers("posts", "users");


//  Добавление записи в базу данных

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add_post"]))
{
    if (!empty($_FILES["img"]["name"]))
    {
        $imgName = time() . "_" . $_FILES["img"]["name"];
        $fileTmpName = $_FILES["img"]["tmp_name"];
        $destination = ROOT_PATH . "/assets/images/posts/" . $imgName;
        $fileType = $_FILES["img"]["type"];
        
        if (strpos($fileType, "image") === false)
        {
            die("Загружать можно только изображения!");
        }


        $result = move_uploaded_file($fileTmpName, $destination);
        if ($result)
        {
            $_POST["img"] = $imgName;
        }
        else
        {
            $errorMessage = "Ошибка загрузки файла на сервер!";
        }
    }
    else
    {
        $errorMessage = "Ошибка получения изображения!";
    }

    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);
    $topic = trim($_POST["topic"]);
    $img = trim($_POST["img"]);
    if ($_POST["post_public"] === null)
    {
        $publish = 0;
    }
    else
    {
        $publish = 1;
    }

    if ($title === "" || $content === "" || $topic === "")
    {
        $errorMessage = "Не все поля заполнены!";
    }
    elseif (mb_strlen($title, "UTF-8") < 5)
    {
        $errorMessage = "Название записи должно быть более пяти символов!";
    }
    else
    {
        $existence = selectOne("posts", ["title" => $title]);
        if ($existence["title"] === $title)
        {
            $errorMessage = "Такая категория уже существует!";
        }
        else
        {
            $post = [
                "id_user" => $_SESSION["id"],
                "title" => $title,
                "content" => $content,
                "img" => $img,
                "status" => $publish,
                "id_topic" => $topic
                
            ];
            $post_id = insert("posts", $post);
            $post = selectOne("posts", ["id" => $post_id]);
            header("Location: " . BASE_URL . "admin/posts/");
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
    tt($_POST);
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