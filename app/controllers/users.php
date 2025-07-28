<?php
include(SITE_ROOT . "/app/database/database.php");

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$isSubmit = false;
$errorMessage = [];
$users = selectAll("users");

function userAuth($data)
{
    $_SESSION["id"] = $data["id"];
    $_SESSION["login"] = $data["username"];
    $_SESSION["admin"] = $data["admin"];

    if ($_SESSION["admin"])
    {
        header("Location: " . BASE_URL . "admin/posts/index.php");
    }
    else
    {
        header("Location: " . BASE_URL);
    }
}


//  Скрипт регистрации
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["button-reg"]))
{
    if ($_POST["username"] === '' || $_POST["mail"] === '' || $_POST["password_repeat"] === '')
    {
        array_push($errorMessage, "Не все поля заполнены!");
    }
    elseif (mb_strlen($_POST["username"], 'UTF-8') < 3)
    {
        array_push($errorMessage, "Логин должен быть более двух символов!");
    }
    elseif ($_POST["password"] !== $_POST["password_repeat"])
    {
        array_push($errorMessage, "Пароли не совпадают!");
    }
    else
    {
        $isset_user = selectOne('users', ["email" => $_POST["mail"]]);
        
        if (!empty($isset_user["email"]) && $isset_user["email"] === $_POST["mail"])
        {
            array_push($errorMessage, "Пользователь с такой почтой уже существует!");
        }
        else
        {
            $params = [
                "admin" => 0,
                "username" => trim($username = $_POST["username"]),
                "email" => trim($email = $_POST["mail"]),
                "password" => trim(password_hash($_POST["password"], PASSWORD_DEFAULT))
            ];
            $user_id = insert("users", $params);
            $user = selectOne("users", ["id" => $user_id]);
            userAuth($user);
        } 
    }
}

//  Скрипт авторизации
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["button-log"]))
{
    if ($_POST["mail_login"] === '' || $_POST["password_login"] === '')
    {
        array_push($errorMessage, "Не все поля заполнены!");
    }
    else
    {
        $isset_user = selectOne('users', ["email" => $_POST["mail_login"]]);
        if ($isset_user["password"] == password_verify($_POST["password_login"], $isset_user["password"]))
        {
            userAuth($isset_user);
        }
        else
        {
            array_push($errorMessage, "Почта или пароль введены неверно!");
        }
    }
}

//  Код добавления пользователя в панеле админа

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["create-user"]))
{

    if ($_POST["admin"] === null)
    {
        $admin = 0;
    }
    else
    {
        $admin = 1;
    }

    if ($_POST["username"] === '' || $_POST["mail"] === '' || $_POST["password_repeat"] === '')
    {
        array_push($errorMessage, "Не все поля заполнены!");
    }
    elseif (mb_strlen($_POST["username"], 'UTF-8') < 3)
    {
        array_push($errorMessage, "Логин должен быть более двух символов!");
    }
    elseif ($_POST["password"] !== $_POST["password_repeat"])
    {
        array_push($errorMessage, "Пароли не совпадают!");
    }
    else
    {
        $isset_user = selectOne('users', ["email" => $_POST["mail"]]);
        
        if (!empty($isset_user["email"]) && $isset_user["email"] === $_POST["mail"])
        {
            array_push($errorMessage, "Пользователь с такой почтой уже существует!");
        }
        else
        {
            $params = [
                "admin" => $admin,
                "username" => trim($username = $_POST["username"]),
                "email" => trim($email = $_POST["mail"]),
                "password" => trim(password_hash($_POST["password"], PASSWORD_DEFAULT))
            ];
            $user_id = insert("users", $params);
            header("Location: " . BASE_URL . "admin/users");
        } 
    }
}

//  Код обновление данных пользователя

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["edit_id"]))
{
    $user = selectOne("users", ["id" => $_GET["edit_id"]]);
    
    $id = $user["id"];
    $admin = $user["admin"];
    $username = $user["username"];
    $email = $user["email"];
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit-user"]))
{
    $id = $_POST["id"];
    $username = trim($_POST["username"]);
    $mail = trim($_POST["mail"]);
    $password = trim($_POST["password"]);
    $password_repeat = trim($_POST["password_repeat"]);

    if ($_POST["admin"] === null)
    {
        $admin = 0;
    }
    else
    {
        $admin = 1;
    }

    if ($username === '' || $mail === '' || $password_repeat === '')
    {
        array_push($errorMessage, "Не все поля заполнены!");
    }
    elseif (mb_strlen($username, 'UTF-8') < 3)
    {
        array_push($errorMessage, "Логин должен быть более двух символов!");
    }
    elseif ($password !== $password_repeat)
    {
        array_push($errorMessage, "Пароли не совпадают!");
    }
    else
    {
        $isset_user = selectOne('users', ["email" => $mail]);
        
        if (!empty($isset_user["email"]) && $isset_user["email"] === $mail && $isset_user["id"] !== $id)
        {
            array_push($errorMessage, "Пользователь с такой почтой уже существует!");
        }
        else
        {
            $params = [
                "admin" => $admin,
                "username" => $username,
                "email" => $mail,
                "password" => password_hash($password, PASSWORD_DEFAULT)
            ];
            $user_id = update("users", $id, $params);
            header("Location: " . BASE_URL . "admin/users");
        } 
    }
}

//  Код удаления пользователя
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["delete_user"]))
{
    $id = $_GET["delete_user"];
    delete("users", $id);
    header("Location: " . BASE_URL . "admin/users");
}