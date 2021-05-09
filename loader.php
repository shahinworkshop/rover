<?php
define('APP_PATH', getcwd() . DIRECTORY_SEPARATOR);
DEFINE('DS', DIRECTORY_SEPARATOR);

spl_autoload_register(function ($class) {
    // separators with directory separators in the relative class name, append
    // with .php
    $file = APP_PATH . str_replace('\\', DS, $class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
        return;
    }
});