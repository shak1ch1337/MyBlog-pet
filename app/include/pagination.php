<nav class="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="?page=1">Первая страница</a>
        </li>

        <?php if($page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo ($page - 1); ?>">Предыдущая страница</a>
            </li>
        <?php endif;?>

        <?php if($page < $totalPages): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo ($page + 1); ?>">Следующая страница</a>
            </li>
        <?php endif;?>

        <li class="page-item">
            <a class="page-link" href="?page=<?php echo $totalPages;?>">Последняя страница</a>
        </li>
    </ul>
</nav>