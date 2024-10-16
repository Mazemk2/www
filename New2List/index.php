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
            echo $template->render('nav.php', ['brandTitle' => 'TODO\'s']);
        ?>
        <div class="row">
            <div class="col-2">
                <h5>Navigation</h5>
                <a href="./Part0-sqlite_linux.php">SQLite-Installation-Linux</a><br>
                <a href="./Part1-Sqlite-Installation.php">Fehlerübersicht und Lösungsvorschläge</a><br>
                <a href="./Part2-sqlite-DB_Erstellen.php">Sqlite Datenbank erstellen</a><br>
                <a href="./Part3-Crud-operationen.php">Crud Operationen</a><br>
                <a href="./Part4-Verbindungueberphp.php">verbindung mit PHP</a><br>
            </div>
            <div class="col-8">
                <h1>Meine TODO-Liste</h1>
                <form id="todo-form">
                    <div class="form-group">
                        <label for="todo-input" class="form-label">Neue Aufgabe</label>
                        <input type="text" id="todo-input" class="form-control" placeholder="Neue Aufgabe hinzufügen">
                        <button type="submit" class="btn btn-primary mt-2">Hinzufügen</button>
                    </div>
                </form>
                <ul id="todo-list" class="list-group mt-3">
                    <!-- Unordered list to dynamically add todo list items. -->
                </ul>
            </div>
            <div class="col-2">may bee</div>
        </div>
    </div>
    
    <script src="todo.js"></script>
</body>
</html>