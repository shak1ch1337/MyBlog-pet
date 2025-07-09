<?php
include("./app/database/database.php");

$isSubmit = false;
$errorMessage = '';


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

            $_SESSION["id"] = $user["id"];
            $_SESSION["login"] = $user["username"];
            $_SESSION["admin"] = $user["admin"];

            if ($_SESSION["admin"])
            {
                header("Location: " . BASE_URL . "admin/admin.php");
            }
            else
            {
                header("Location: " . BASE_URL);
            }
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
        // tt($isset_user);
        // die();

        if (trim(password_verify($_POST["password_login"], $isset_user["password"])))
        {
            echo "Авторизовать";
        }
        else
        {
            echo "Ошибка авторизации";
        }
    }
}
