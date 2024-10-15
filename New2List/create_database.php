<?php
try {
    $db = new PDO('sqlite:/srv/www/New2List/todos.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("CREATE TABLE IF NOT EXISTS todos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        text TEXT NOT NULL,
        completed INTEGER DEFAULT 0
    )");
    echo "Datenbank und Tabelle erstellt oder existieren bereits.";
} catch (PDOException $e) {
    echo "Fehler: " . $e->getMessage();
}
?>