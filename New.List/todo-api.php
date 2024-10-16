<?php

require_once(__DIR__ . "/classes/TodoDB.php");
require_once(__DIR__ . "/logging.php");

header("Content-Type: application/json");

/**
 * Todo database object.
 */
$todoDB = new TodoDB();

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        // Get Todo's (READ)
        $todo_items = $todoDB->getTodos();
        echo json_encode($todo_items);
        write_log("READ", $todo_items);
        break;
        
    case "POST":
        // Get data from the input stream.
        $input = file_get_contents('php://input');

        // Decode JSON input data into PHP array.
        $data = json_decode($input, true);

        $result = $todoDB->createTodo($data['task']);

        // Fehlerbehandlung für CREATE
        if ($result === true) {
            // Erfolg
            echo json_encode(['status' => 'success']);
            write_log("CREATE", $data);
        } else {
            // Misserfolg
            echo json_encode(['status' => 'failure']);
            write_log("CREATE FAILED", $data);
        }
        break;

    case "PUT":
        // Change Todo (UPDATE)

        // Get data from the input stream.
        $input = file_get_contents('php://input');

        // Decode JSON input data into PHP array.
        $data = json_decode($input, true);

        $result = $todoDB->updateTodo($data['id']);

        // Fehlerbehandlung für UPDATE
        if ($result === true) {
            // Erfolg
            echo json_encode(['status' => 'success']);
            write_log("UPDATE", $data);
        } else {
            // Misserfolg
            echo json_encode(['status' => 'failure']);
            write_log("UPDATE FAILED", $data);
        }
        break;

    case "DELETE":
        // Remove Todo (DELETE)

        // Get the data from the php input stream.
        $data = json_decode(file_get_contents('php://input'), true);

        $result = $todoDB->deleteTodo($data['id']);

        if ($result === true) {
            // Erfolg
            echo json_encode(['status' => 'success']);
            write_log("DELETE", $data);
        } else {
            // Misserfolg
            echo json_encode(['status' => 'failure']);
            write_log("DELETE FAILED", $data);
        }
        break;
}

?>