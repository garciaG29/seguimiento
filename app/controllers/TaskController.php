<?php

require_once "app/models/Task.php";

class TaskController {

    public function index() {
        $task = new Task();
        $tasks = $task->getAll();
        require "app/views/tasks/index.php";
    }

    public function store() {
        if (!empty($_POST['title'])) {
            $task = new Task();
            $task->create($_POST['title']);
        }
        header("Location: index.php?controller=task&method=index");
    }

    public function delete() {
        if (!empty($_GET['id'])) {
            $task = new Task();
            $task->delete($_GET['id']);
        }
        header("Location: index.php?controller=task&method=index");
    }
}
