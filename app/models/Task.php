<?php

require_once "config/database.php";

class Task {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $query = $this->conn->prepare("SELECT * FROM tasks ORDER BY id DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title) {
        $query = $this->conn->prepare("INSERT INTO tasks (title) VALUES (:title)");
        $query->bindParam(":title", $title);
        return $query->execute();
    }

    public function delete($id) {
        $query = $this->conn->prepare("DELETE FROM tasks WHERE id = :id");
        $query->bindParam(":id", $id);
        return $query->execute();
    }
}
