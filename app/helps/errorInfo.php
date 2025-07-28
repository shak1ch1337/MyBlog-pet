<?php if (count($errorMessage) > 0): ?>
    <ul>
        <?php foreach ($errorMessage as $error): ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>