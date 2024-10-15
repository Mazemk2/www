<?php

$host = '127.0.0.1';
$db = 'todo_list';
$user = 'your-username';
$pass = 'your-password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    error_log("PDOException: " . $e->getMessage() . " in "
              . $e->getFile() . " on line " . $e->getLine());
}

$statement = $pdo->query("SELECT text from todos");
$items = $statement->fetchAll();

foreach ($items as $item) {
    echo "TODO: " . $item['text'] . "<br>";
}

echo "<br><br><br>";

$insert_statement = $pdo->prepare("INSERT INTO todos (text, completed) VALUES (:text, :completed)");
$result = $insert_statement->execute(['text' => 'JSON benutzen erledigt', 'completed' => 1]);
var_dump($result);

$delete_statement = $pdo->prepare("DELETE FROM todos WHERE id=:myid");
$result = $delete_statement->execute(["myid" => 3]);
var_dump($result);

?>