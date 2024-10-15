<?php

class TodoDB
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('sqlite:todos.db');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->createTable();
    }

    private function createTable()
    {
        $this->db->exec("CREATE TABLE IF NOT EXISTS todos (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            text TEXT NOT NULL,
            completed BOOLEAN NOT NULL DEFAULT 0
        )");
    }

    public function getTodos()
    {
        $stmt = $this->db->query("SELECT * FROM todos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createTodo($text)
    {
        $stmt = $this->db->prepare("INSERT INTO todos (text) VALUES (:text)");
        return $stmt->execute([':text' => $text]);
    }

    public function updateTodo($id)
    {
        $stmt = $this->db->prepare("UPDATE todos SET completed = NOT completed WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function deleteTodo($id)
    {
        $stmt = $this->db->prepare("DELETE FROM todos WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
?>