<?php

require_once "config/database.php";

class Note {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $sql = $this->conn->prepare("SELECT * FROM notes ORDER BY id DESC");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($message) {
        $sql = $this->conn->prepare("INSERT INTO notes (message) VALUES (:message)");
        $sql->bindParam(":message", $message);
        return $sql->execute();
    }

    public function delete($id) {
        $sql = $this->conn->prepare("DELETE FROM notes WHERE id = :id");
        $sql->bindParam(":id", $id);
        return $sql->execute();
    }
}
