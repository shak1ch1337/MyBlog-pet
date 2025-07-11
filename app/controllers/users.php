<?php
include("./app/database/database.php");

$isSubmit = false;
$errorMessage = '';

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
        $errorMessage = "Не все поля заполнены!";
    }
    elseif (mb_strlen($_POST["username"], 'UTF-8') < 3)
    {
        $errorMessage = "Логин должен быть более двух символов!";
    }
    elseif ($_POST["password"] !== $_POST["password_repeat"])
    {
        $errorMessage = "Пароли не совпадают!";
    }
    else
    {
        $isset_user = selectOne('users', ["email" => $_POST["mail"]]);
        
        if (!empty($isset_user["email"]) && $isset_user["email"] === $_POST["mail"])
        {
            $errorMessage = "Пользователь с такой почтой уже существует!";
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
        $errorMessage = "Не все поля заполнены!";
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
            $errorMessage = "Почта или пароль введены неверно!";
        }
    }
}
