<?php

require_once(__DIR__ . '/../config.php');


/**
 * Database handling for the todos in the FI35 demo project.
 *
 * All database functionality is defined here.
 *
 * @author  US-FI36 <post@fi36-coding.com>
 * @property object $connection PDO connection to the MariaDB
 * @property object $stmt Database statement handler object.
 */
class TodoDB {
    private $connection;
    private $stmt;

    /**
     * Constructor of the TodoDB class.
     */
    public function __construct() {
        global $host, $db, $user, $pass;
        try {
            $this->connection = new PDO(
                "mysql:host=$host;dbname=$db;",
                $user,
                $pass
            );
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

    /**
     * Prepare and execute the given sql statement.
     *
     * @param string $sql The sql statement.
     * @param array $params An array of the needed parameters.
     * @return object $stmt The excecuted statement.
     */
    private function prepareExecuteStatement($sql, $params = []) {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch(Exception $e) {
            error_log($e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Holt aktuelle Todos aus der Datenbank.
     *
     * @return array $todo_items Liste von Todoeinträgen
     */
    public function getTodos() {
        $statement = $this->connection->query("SELECT id, text, completed from todos");
        $todo_items = $statement->fetchAll();
        return $todo_items;
    }

    /**
     * Erstellt neues Todo aus dem gegebenen Text.
     *
     * @param string $text Text des Todos
     * @return boolean $result Erfolg der DB Operation
     */
    public function createTodo($text) {
        // Prepare the insert statement.
        $insert_statement = $this->connection->prepare(
            "INSERT INTO todos (text, completed) VALUES (:text, :completed)");

        // Execute the insertion.
        $result = $insert_statement->execute(['text' => $text,
                                              'completed' => 0]);
        return $result;
    }

    /**
     * Falls das Todo-Element erledigt ist, wird das in der Datenbank reflektiert.
     *
     * @param int id ID des Todos
     * @return boolean $result Erfolg der DB Operation
     */
    public function updateTodo($id) {
        // Prepare the insert statement.
        $complete_statement = $this->connection->prepare("UPDATE todos SET completed=NOT completed WHERE id= :myid");

        // Execute the deletion.
        $result = $complete_statement->execute(["myid" => $id]);

        return $result;
    }

    /**
     * Entfernen des TODO-Elements.
     *
     * @param int id ID des Todos
     * @return boolean $result Erfolg der DB Operation
     */
    public function deleteTodo($id) {
        // Prepare the insert statement.
        $delete_statement = $this->connection->prepare("DELETE FROM todos WHERE id=:myid");

        // Execute the deletion.
        $result = $delete_statement->execute(["myid" => $id]);

        return $result;
    }

}

?>