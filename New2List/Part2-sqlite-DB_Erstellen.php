<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erstellen und Einbinden einer SQLite-Datenbank</title>
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <?php
            require_once(__DIR__ . '/classes/Template.php');
            $template = new Template(__DIR__ . '/templates', []);
            echo $template->render('nav.php', ['brandTitle' => 'SQLite Integration']);
        ?>
        <div class="row">
            <div class="col-2">
                <nav>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="index.php">Zurück zur TODO-Liste</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-8">
                <h1>Erstellen und Einbinden einer SQLite-Datenbank</h1>
                <p>Um SQLite in deinem Projekt zu verwenden, folge diesen Schritten:</p>
                <h2>1. SQLite-Installation</h2>
                <p>Installiere SQLite auf deinem Linux-System mit dem folgenden Befehl:</p>
                <pre><code>sudo apt-get install sqlite3 libsqlite3-dev</code></pre>
                <p>Überprüfe die Installation mit:</p>
                <pre><code>sqlite3 --version</code></pre>

                <h2>2. Erstellen der Datenbank</h2>
                <p>Erstelle eine neue SQLite-Datenbank, z.B. für eine TODO-Liste:</p>
                <pre><code>sqlite3 todo.db</code></pre>
                <p>Innerhalb der SQLite-Shell kannst du dann Tabellen anlegen:</p>
                <pre><code>
CREATE TABLE todos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    task TEXT NOT NULL,
    completed INTEGER DEFAULT 0
);
                </code></pre>

                <h2>3. Einbindung in PHP</h2>
                <p>Um auf die Datenbank in PHP zuzugreifen, musst du das SQLite-Modul aktivieren und eine Verbindung herstellen:</p>
                <pre><code>
$pdo = new PDO('sqlite:' . __DIR__ . '/todo.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                </code></pre>
                <p>Jetzt kannst du SQL-Befehle wie <code>SELECT</code>, <code>INSERT</code>, <code>UPDATE</code> und <code>DELETE</code> ausführen.</p>
            </div>
        </div>
    </div>
</body>
</html>
