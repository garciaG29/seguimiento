<?php

require_once "app/models/User.php";

class UserController {

    public function index() {
        $user = new User();
        $users = $user->getAll();
        require "app/views/users/index.php";
    }

    public function store() {
        if (!empty($_POST['name']) && !empty($_POST['email'])) {
            $user = new User();
            $user->create($_POST['name'], $_POST['email']);
        }
        header("Location: index.php?controller=user&method=index");
    }

    public function delete() {
        if (!empty($_GET['id'])) {
            $user = new User();
            $user->delete($_GET['id']);
        }
        header("Location: index.php?controller=user&method=index");
    }
}
