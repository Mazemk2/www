<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO-Liste</title>

    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/styles.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <?php
            require_once(__DIR__ . '/classes/Template.php');
            $template = new Template(__DIR__ . '/templates', []);
            echo $template->render('nav.php', ['brandTitle' => 'Home']);
        ?>
        <div class="row">
            <div class="col-2"> </div>
            <div class="col-8">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus veniam mollitia omnis molestiae tempora! Unde, quidem repudiandae qui impedit placeat mollitia doloribus deleniti praesentium consectetur reiciendis harum quaerat quam molestiae.
            </div>
            <div class="col-2"> </div>
        </div>
    </div>
    <script src="todo.js"></script>
</body>
</html>