<html>
    <head>
        <title>About Me</title>
    </head>
    <body>
        <?php
            include 'about_me.php';
        ?>

        <h1><?php echo $name , " " , $surname; ?></h1>
        <p>Возраст: <?php echo $age; ?></p>

        <h2>Интересы:</h2>
        <ul>
            <?php foreach ($interests as $interests) : ?>
                <li><?php echo htmlentities($interests); ?></li>
            <?php endforeach; ?>
        </ul>

    <body>
</html>
