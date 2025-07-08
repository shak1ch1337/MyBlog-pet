<?php include("path.php"); ?>

<!DOCTYPE html>
<html lang="en">
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
        
        <?php include("app/include/header.php"); ?>

        <!--Block "main"-->

        <div class="container">
            <div class="content row">

                <!--Main content-->
    
                <div class="main-content col-md-9 col-12">
                    <h2>Заголовок</h2>
                    <div class="single_post row">
                        <div class="img col-12">
                            <img src="assets/images/image_1.png" class="img-thumbnail">
                            
                        </div>
                        <div class="info">
                            <i class="far fa-user"> Имя Автора</i>
                            <i class="far fa-calendar"> Mar 11, 2019</i>
                        </div>
                        
                        <div class="single_post_text col-12">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque leo sem, auctor a dictum non, luctus efficitur dolor.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque leo sem, auctor a dictum non, 
                                luctus efficitur dolor. Duis et ante quis turpis lacinia malesuada. Etiam at malesuada nibh. 
                                Praesent sem mauris, auctor vel urna ut, mattis convallis odio. Quisque in egestas sapien, 
                                vel gravida urna.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque leo sem, auctor 
                                a dictum non, luctus efficitur dolor. Duis et ante quis turpis lacinia malesuada. 
                                Etiam at malesuada nibh. Praesent sem mauris, auctor vel urna ut, mattis convallis odio.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque leo sem, auctor a dictum non, luctus efficitur dolor.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque leo sem, auctor a dictum non, 
                                luctus efficitur dolor. Duis et ante quis turpis lacinia malesuada. Etiam at malesuada nibh. 
                                Praesent sem mauris, auctor vel urna ut, mattis convallis odio. Quisque in egestas sapien, 
                                vel gravida urna.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque leo sem, auctor a dictum non, 
                                luctus efficitur dolor. Duis et ante quis turpis lacinia malesuada. Etiam at malesuada nibh. 
                                Praesent sem mauris, auctor vel urna ut, mattis convallis odio. Quisque in egestas sapien, vel gravida urna. 
                                Aenean eu placerat est, vel blandit turpis. In hac habitasse platea dictumst. 
                                Nunc erat magna, gravida vitae diam a, tempor cursus enim. Etiam commodo dapibus interdum. 
                                Aliquam erat volutpat.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque leo sem, auctor a dictum non, luctus efficitur dolor.
                            </p>
                        </div>
                    </div>
                </div>
    
                <!--Sidebar content-->
    
                <div class="sidebar col-md-3 col-12">
                    <div class="section search">
                        <h3>Поиск</h3>
                        <form action="" method="post">
                            <input type="text" name="search-term" class="text-input" placeholder="Посик...">
                        </form>
                    </div>

                    <div class="section topics">
                        <h3>Категори</h3>
                        <ul>
                            <li><a href="#">Програмирование</a></li>
                            <li><a href="#">Дизайн</a></li>
                            <li><a href="#">Визуализация</a></li>
                            <li><a href="#">Кейсы</a></li>
                            <li><a href="#">Мотивация</a></li>
                        </ul>
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