<?php

class Alumno {
    public $nombre;
    public $edad;

    public function __construct($nombre = "", $edad = "") {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
}
?>
