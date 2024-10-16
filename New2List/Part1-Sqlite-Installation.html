<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fehlerübersicht und Lösungsvorschläge</title>
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <?php
            require_once(__DIR__ . '/classes/Template.php');
            $template = new Template(__DIR__ . '/templates', []);
            echo $template->render('nav.php', ['brandTitle' => 'Fehlerübersicht']);
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
                <h1>Fehlerübersicht und Lösungsvorschläge</h1>
                
                <h2>1. Fehler: Undefined array key "task"</h2>
                <p><strong>Beschreibung:</strong> Dieser Fehler tritt auf, wenn versucht wird, auf den <code>task</code>-Schlüssel in einem leeren oder unvollständigen Array zuzugreifen.</p>
                <p><strong>Lösungsvorschlag:</strong> Stelle sicher, dass der Wert korrekt vom Frontend übergeben wird. Vergewissere dich, dass der Schlüssel "task" in der JSON-Datenübertragung vorhanden ist. Du kannst eine Überprüfung hinzufügen, um sicherzustellen, dass alle Felder ausgefüllt sind:</p>
                <pre><code>
if (!isset($data['task']) || empty($data['task'])) {
    echo json_encode(['status' => 'failure', 'message' => 'Task is missing']);
    exit;
}
                </code></pre>

                <h2>2. Fehler: SQLSTATE[23000]: Integrity constraint violation</h2>
                <p><strong>Beschreibung:</strong> Dieser Fehler tritt auf, wenn versucht wird, eine ungültige oder unvollständige Eingabe in die Datenbank einzufügen, z.B. eine leere <code>task</code>.</p>
                <p><strong>Lösungsvorschlag:</strong> Prüfe, ob alle benötigten Felder gefüllt sind, bevor sie in die Datenbank eingefügt werden. Füge serverseitige Validierung hinzu, um sicherzustellen, dass der Wert für <code>task</code> nicht leer ist:</p>
                <pre><code>
$task = trim($data['task']);
if (empty($task)) {
    echo json_encode(['status' => 'failure', 'message' => 'Task cannot be empty']);
    exit;
}
                </code></pre>

                <h2>3. Fehler: Fetch-API Fehlerbehandlung</h2>
                <p><strong>Beschreibung:</strong> Fehler können auch von der API kommen, wenn z.B. ein ungültiger HTTP-Statuscode zurückgegeben wird. Ein Beispiel könnte das Fehlen von Error-Handling auf der Frontend-Seite sein.</p>
                <p><strong>Lösungsvorschlag:</strong> Füge Error-Handling in den Fetch-Aufrufen hinzu, um Fehlermeldungen anzuzeigen:</p>
                <pre><code>
fetch('api.php', { ... })
    .then(response => {
        if (!response.ok) throw new Error('Server Error');
        return response.json();
    })
    .catch(error => alert('Fehler: ' + error.message));
                </code></pre>
            </div>
        </div>
    </div>
</body>
</html>
