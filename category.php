<?php
include("path.php");
include("app/controllers/topics.php");

$posts = selectAll("posts", ["id_topic" => $_GET["category_id"]]);
$topPosts = selectTopPostsFromPostsWithUserOnIndex("posts");
$category = selectOne('topics', ["id" => $_GET["category_id"]]);
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

                <!--Main content-->
    
                <div class="main-content col-md-9 col-12">
                    <h2>Поиск по категории: <strong><?php echo $category["name"]?></strong></h2>
                    <?php foreach ($posts as $post): ?>

                        <div class="post row">
                            <div class="img col-12 col-md-4">
                                <img class="img post_img col-12 col-md-4" src="<?php echo BASE_URL . "assets/images/posts/" . $post["img"] ?>">
                            </div>
                            <div class="post_text col-12 col-md-8">
                                <h3>
                                    <a href="<?php echo BASE_URL . "single.php?post=" . $post["id"]; ?>"><?php echo mb_substr($post["title"], 0, 120, "UTF-8") . "..." ?></a>
                                </h3>
                                <i class="far fa-user"> <?php echo $post["username"] ?></i>
                                <i class="far fa-calendar"> <?php echo $post["create_date"] ?></i>
                                <p class="preview-text">
                                    <?php echo mb_substr($post["content"], 0, 150, 'UTF-8') . "..."; ?>
                                </p>
                            </div>
                        </div>

                    <?php endforeach; ?>

                    
                </div>
    
                <!--Sidebar content-->
    
                <div class="sidebar col-md-3 col-12">
                    <div class="section search">
                        <h3>Поиск</h3>
                        <form action="search.php" method="post">
                            <input type="text" name="search-term" class="text-input" placeholder="Посик...">
                        </form>
                    </div>

                    <div class="section topics">
                        <h3>Категори</h3>
                        <ul>
                            <?php foreach($topics as $key => $topic):?>
                            <li><a href="<?php echo BASE_URL . "category.php?category_id=" . $topic["id"]; ?>"><?php echo $topic["name"]; ?></a></li>
                            <?php endforeach; ?>
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