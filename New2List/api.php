<?php

require_once(__DIR__ . "/classes/TodoDB.php");
require_once(__DIR__ . "/logging.php");

header("Content-Type: application/json");

$todoDB = new TodoDB();

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $todo_items = $todoDB->getTodos();
        echo json_encode($todo_items);
        write_log("READ", $todo_items);
        break;
        
    case "POST":
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        $result = $todoDB->createTodo($data['text']);

        if ($result === true) {
            echo json_encode(['status' => 'success']);
            write_log("CREATE", $data);
        } else {
            echo json_encode(['status' => 'failure']);
            write_log("CREATE FAILED", $data);
        }
        break;

    case "PUT":
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        $result = $todoDB->updateTodo($data['id']);

        if ($result === true) {
            echo json_encode(['status' => 'success']);
            write_log("UPDATE", $data);
        } else {
            echo json_encode(['status' => 'failure']);
            write_log("UPDATE FAILED", $data);
        }
        break;

    case "DELETE":
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $todoDB->deleteTodo($data['id']);

        if ($result === true) {
            echo json_encode(['status' => 'success']);
            write_log("DELETE", $data);
        } else {
            echo json_encode(['status' => 'failure']);
            write_log("DELETE FAILED", $data);
        }
        break;
}
?>
