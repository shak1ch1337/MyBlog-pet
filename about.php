<?php
include("path.php");
include("./app/controllers/users.php");
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <script src="https://kit.fontawesome.com/db55a8cab1.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <title>My blog</title>
    </head>
    <body>
        
        <?php include ("app/include/header.php"); ?>

        <!--Block "main"-->

        <div class="container">
            <div class="content row">
    
                <div class="row">
                    <h2 class="slider-title">Информация о сайте</h2>
                </div>

                
                <div style="margin: 100px 0px 400px 0px;" class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Для чего вообще этот сайт?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Данный сайт не является рабочей версией, а всего лишь тестовый проект для изучения языка программирования <strong>PHP</strong>, понимание работы с базой данных средствами <strong>PDO</strong>.
                                В последующем код этой работы отправится на Gitnub<br><br>
                                <i>Ссылка на исходный код: <a class="about-link" href="https://www.github.com/shak1ch1337/MyBlog-pet">Github</a></i>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Суть сайта
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Сайт представляет собой блог, с возможностью регистрации, добавления, редактирования и удаления категорий, постов и пользователей. 
                                Также оформлен простой поиск по статьям, пагинация, выборка по категориям, вывод топ-постов в слайдер и управление блогов через панель администратора.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Архитектура сайта
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Сайт имеет далеко <b>не идеальную, и даже не хорошую архитектуру</b>.<br>
                                Весь сайт написан на "чистом" <strong>PHP</strong>, без использования каких-либо фреймворков. Отсутствует современный роутинг. Подключение к базе данных 
                                осуществлено с помощью <strong>PDO</strong>.<br>
                                В качестве СУБД используется <strong>MySQL</strong>.
                            </div>
                        </div>
                    </div>
                </div>
   
            </div>
        </div>
        
        <!--Footer-->

        <?php include("app/include/footer.php"); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </body>
</html>