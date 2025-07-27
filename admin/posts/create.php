<?php
include("../../path.php");
include ("../../app/controllers/posts.php");
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
            
                <?php include ("../../app/include/sidebar-admin.php"); ?>

                <div class="posts col-9">
                    <div class="button row">
                        <a href="<?php echo BASE_URL . "admin/posts/create.php" ?>" class="col-3 btn btn-success">Создать</a>
                        <span class="col-1"></span>
                        <a href="<?php echo BASE_URL . "admin/posts" ?>" class="col-3 btn btn-warning">Редактировать</a>
                    </div>
                    <div class="row title-table">
                        <h2>Добавление записи</h2>
                    </div>
                    <div class="row add-post">
                        <div class="mb-12 col-12 col-md-12 err">
                            <!--Вывод ошибок-->
                            <?php include "../../app/helps/errorInfo.php"?>
                        </div>
                        <form action="create.php" method="post" enctype="multipart/form-data">
                            <div class="col">
                                <input type="text" class="form-control" name="title" placeholder="Название статьи" aria-label="Название статьи">
                            </div>
                            <div class="col">
                                <label for="content" class="form-label">Содержимое записи</label>
                                <textarea class="form-control" name="content" id="content" rows="6"></textarea>
                            </div>
                            <div class="input-group col">
                                <input type="file" name="img" class="form-control" id="inputGroupFile02">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                            <select class="form-select" name="topic" aria-label="Default select example">
                                <option selected>Выберите категорию</option>
                                <?php foreach($topics as $key => $topic): ?>
                                <option value="<?php echo $topic["id"]; ?>"><?php echo $topic["name"]; ?></option>
                                <?php endforeach; ?>
                            </select>

                            <div class="col col-6">
                                <input name="post_public" type="checkbox" value="1">
                                <label>Publish</label>
                            </div>

                            <div class="col col-6">
                                <button class="btn btn-primary" name="add_post" type="submit">Добавить запись</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
        
        <!--Footer-->

        <?php include("../../app/include/footer.php"); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </body>
</html>