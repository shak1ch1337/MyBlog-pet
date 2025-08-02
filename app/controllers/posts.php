<?php

include(SITE_ROOT . "/app/database/database.php");

$errorMessage = [];
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
            array_push($errorMessage, "Загружать можно только изображения!");
        }


        $result = move_uploaded_file($fileTmpName, $destination);
        if ($result)
        {
            $_POST["img"] = $imgName;
        }
        else
        {
            array_push($errorMessage, "Ошибка загрузки файла на сервер!");
        }
    }
    else
    {
        array_push($errorMessage, "Ошибка получения изображения!");
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
        array_push($errorMessage,"Не все поля заполнены!");
    }
    elseif (mb_strlen($title, "UTF-8") < 5)
    {
        array_push($errorMessage, "Название записи должно быть более пяти символов!");
    }
    else
    {
        $existence = selectOne("posts", ["title" => $title]);
        if ($existence["title"] === $title)
        {
            array_push($errorMessage, "Такая категория уже существует!");
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


//  Редактирование записи

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $post = selectOne("posts", ["id" => $_GET["id"]]);
    $id = $post["id"];
    $title = $post["title"];
    $content = $post["content"];
    $id_topic = $post["id_topic"];
    $status = $post["status"];
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit_post"]))
{

    if (!empty($_FILES["img"]["name"]))
    {
        $imgName = time() . "_" . $_FILES["img"]["name"];
        $fileTmpName = $_FILES["img"]["tmp_name"];
        $destination = ROOT_PATH . "/assets/images/posts/" . $imgName;
        $fileType = $_FILES["img"]["type"];
        
        if (strpos($fileType, "image") === false)
        {
            array_push($errorMessage, "Загружать можно только изображения!");
        }


        $result = move_uploaded_file($fileTmpName, $destination);
        if ($result)
        {
            $_POST["img"] = $imgName;
        }
        else
        {
            array_push($errorMessage, "Ошибка загрузки файла на сервер!");
        }
    }
    else
    {
        array_push($errorMessage, "Ошибка получения изображения!");
    }

    $id = $_POST["id"];
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
        array_push($errorMessage,"Не все поля заполнены!");
    }
    elseif (mb_strlen($title, "UTF-8") < 5)
    {
        array_push($errorMessage, "Название записи должно быть более пяти символов!");
    }
    else
    {
        $existence = selectOne("posts", ["title" => $title]);
        if ($existence["title"] === $title)
        {
            array_push($errorMessage, "Такая запись уже существует!");
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
            
            $post = update("posts", $id, $post);
            header("Location: " . BASE_URL . "admin/posts/");
        }
    }
}


//  Удаление записи

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["delete_id"]))
{
    $id = $_GET["delete_id"];
    delete("posts", $id);
    header("Location: " . BASE_URL . "admin/posts/");
}

//  Публикация записи

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["pub_id"]))
{
    $pubId = $_GET["pub_id"];
    $status = $_GET["publish"];
    update("posts", $pubId, ['status' => $status]);
    header("Location: ". BASE_URL . 'admin/posts');
    die();
}