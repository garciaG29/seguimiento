<?php

require_once "config/database.php";

class User {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $sql = $this->conn->prepare("SELECT * FROM users ORDER BY id DESC");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $email) {
        $sql = $this->conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $sql->bindParam(':name', $name);
        $sql->bindParam(':email', $email);
        return $sql->execute();
    }

    public function delete($id) {
        $sql = $this->conn->prepare("DELETE FROM users WHERE id = :id");
        $sql->bindParam(':id', $id);
        return $sql->execute();
    }
}
  
