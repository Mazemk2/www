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

        $result = $todoDB->createTodo($data['text']);

        // Tell the client the success of the operation.
        echo json_encode(['status' => 'success']);

        write_log("CREATE", $data);
        break;
    case "PUT":
        // Change Todo (UPDATE)

        // Get data from the input stream.
        $input = file_get_contents('php://input');

        // Decode JSON input data into PHP array.
        $data = json_decode($input, true);

        $result = $todoDB->updateTodo($data['id']);

        // Tell the client the success of the operation.
        echo json_encode(['status' => 'success']);

        write_log("PUT", $data);
        break;
    case "DELETE":
        // Remove Todo (DELETE)

        // Get the data from the php input stream.
        $data = json_decode(file_get_contents('php://input'), true);

        $result = $todoDB->deleteTodo($data['id']);

        if ($result === true) {
            // Tell the client the success of the operation.
            echo json_encode(['status' => 'success']);
            write_log("DELETE", $data);
        } else {
            // or the failure
            echo json_encode(['status' => 'failure']);
            write_log("DELETE FAILED", $data);
        }
        break;
}

?>