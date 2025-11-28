<?php

require_once "app/models/Note.php";

class NoteController {

    public function index() {
        $note = new Note();
        $notes = $note->getAll();
        require "app/views/notes/index.php";
    }

    public function store() {
        if (!empty($_POST['message'])) {
            $note = new Note();
            $note->create($_POST['message']);
        }
        header("Location: index.php?controller=note&method=index");
    }

    public function delete() {
        if (!empty($_GET['id'])) {
            $note = new Note();
            $note->delete($_GET['id']);
        }
        header("Location: index.php?controller=note&method=index");
    }
}
