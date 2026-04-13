<?php
spl_autoload_register(function($class) {
    $baseDir = dirname(__DIR__); 

    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    $file = $baseDir . DIRECTORY_SEPARATOR . $path . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        die("Fichier non trouvé : " . $file);
    }
});