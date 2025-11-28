<?php

class Alumno {

    private $nombre;
    private $curso;
    private $grado;
    private $telefono;

    public function __construct($nombre, $curso, $grado, $telefono) {
        $this->nombre = $nombre;
        $this->curso = $curso;
        $this->grado = $grado;
        $this->telefono = $telefono;
    }

    // Método para devolver la información lista para guardar en TXT
    public function formatoTexto() {
        return "Nombre: {$this->nombre} - Curso: {$this->curso} - Grado: {$this->grado} - Teléfono: {$this->telefono}\n";
    }
}

?>
