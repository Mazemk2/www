<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verbindung zwischen Frontend und SQLite über PHP-API</title>
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <?php
            require_once(__DIR__ . '/classes/Template.php');
            $template = new Template(__DIR__ . '/templates', []);
            echo $template->render('nav.php', ['brandTitle' => 'Frontend-API-Verbindung']);
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
                <h1>Verbindung zwischen Frontend (JavaScript) und SQLite über PHP-API</h1>
                <p>Um das Frontend (JavaScript) mit einer SQLite-Datenbank zu verbinden, verwenden wir eine PHP-API.</p>

                <h2>1. Abrufen der Aufgaben</h2>
                <pre><code>
fetch('api.php')
    .then(response => response.json())
    .then(data => {
        data.forEach(todo => {
            // Aufgabe anzeigen
        });
    });
                </code></pre>
                <p>Hier wird ein GET-Request an die PHP-API gesendet, um die Aufgaben aus der SQLite-Datenbank zu laden.</p>

                <h2>2. Hinzufügen einer neuen Aufgabe</h2>
                <pre><code>
fetch('api.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ task: newTask })
});
                </code></pre>
                <p>Dies sendet eine neue Aufgabe über einen POST-Request an die API, die sie in die Datenbank einfügt.</p>

                <h2>3. Aktualisieren und Löschen</h2>
                <p>Ähnlich wie beim Hinzufügen kannst du PUT- und DELETE-Requests verwenden, um Aufgaben zu aktualisieren oder zu löschen.</p>
                <pre><code>
fetch('api.php', {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ id: taskId })
});
                </code></pre>
                <p>Mit dem oben gezeigten PUT-Request kannst du den Status einer Aufgabe ändern.</p>
            </div>
        </div>
    </div>
</body>
</html>
