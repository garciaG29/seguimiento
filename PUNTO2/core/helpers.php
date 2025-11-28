<?php

function view($name, $data = [])
{
    $path = __DIR__ . '/../views/' . $name . '.php';

    if (!file_exists($path)) {
        echo "La vista $name no existe.";
        return;
    }

    extract($data);
    include $path;
}

