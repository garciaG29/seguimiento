<?php

function view($name, $data = [])
{
    $path = __DIR__ . '/../views/' . $name . '.blade.php';

    if (!file_exists($path)) {
        echo "La vista $name no existe.";
        return;
    }

    // Extraer variables para que estén disponibles en la vista
    extract($data);

    include $path;
}
