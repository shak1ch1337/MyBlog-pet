<?php
session_start();
include("../../path.php");
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <script src="https://kit.fontawesome.com/db55a8cab1.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../../assets/css/admin.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <title>My blog</title>
    </head>
    <body>

        <!--Header-->
        
        <?php include ("../../app/include/header-admin.php"); ?>

        <div class="container">
            <div class="row">
                <div class="sidebar col-3">
                    <ul>
                        <li><a href="#">Записи</a></li>
                        <li><a href="#">Пользователи</a></li>
                        <li><a href="#">Категории</a></li>
                    </ul>
                </div>
                <div class="posts col-9">
                    <div class="button row">
                        <a href="create.html" class="col-3 btn btn-success">Создать пользователя</a>
                        <span class="col-1"></span>
                        <a href="index.html" class="col-3 btn btn-warning">Управление пользователями</a>
                    </div>
                    <div class="row title-table">
                        <h2>Создать пользователя</h2>
                    </div>
                    <div class="row add-post">
                        <form action="create.php" method="post">
                            <div class="col">
                                <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" name="username" placeholder="Введите ваш логин">
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="mail" aria-describedby="emailHelp" placeholder="Введите ваш e-mail">
                            </div>

                            <div class="col">
                                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Введите пароль">
                            </div>

                            <div class="col">
                                <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
                                <input type="password" class="form-control" name="password_repeat" id="exampleInputPassword2" placeholder="Введите пароль еще раз">
                            </div>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>User</option>
                                <option value="1">Admin</option>
                            </select>
                            <div class="col">
                                <button class="btn btn-primary" type="submit">Создать пользователя</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
        
        <!--Footer-->

        <?php include("../../app/include/footer.php"); ?>

        <script src="https://cdn.ckeditor.com/ckeditor5/46.0.0/ckeditor5.umd.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

        <script src="../../assets/js/script.js"></script>
    </body>
</html>