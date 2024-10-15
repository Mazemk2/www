<?php

// Pfad zur SQLite-Datenbank
$db_file = './todo.db';  // Stelle sicher, dass dies der korrekte Pfad zur Datenbank ist

// DSN für SQLite
$dsn = "sqlite:$db_file";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    // Verbindung zu SQLite herstellen
    $pdo = new PDO($dsn, null, null, $options);
} catch (PDOException $e) {
    error_log("PDOException: " . $e->getMessage() . " in "
              . $e->getFile() . " on line " . $e->getLine());
}

// Alle Todos abrufen
$statement = $pdo->query("SELECT text FROM todos");
$items = $statement->fetchAll();

// Todos ausgeben
foreach ($items as $item) {
    echo "TODO: " . $item['text'] . "<br>";
}

echo "<br><br><br>";

// Neues Todo hinzufügen
$insert_statement = $pdo->prepare("INSERT INTO todos (text, completed) VALUES (:text, :completed)");
$result = $insert_statement->execute(['text' => 'JSON benutzen erledigt', 'completed' => 1]);
var_dump($result);

// Todo mit der ID 3 löschen
$delete_statement = $pdo->prepare("DELETE FROM todos WHERE id=:myid");
$result = $delete_statement->execute(["myid" => 3]);
var_dump($result);

?>
