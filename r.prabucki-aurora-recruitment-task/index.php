<?php
// Config initialization
require __DIR__ . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php";
require PATH_CONFIG . DS . "input-cleaning.php";

//System classes autoload
spl_autoload_register (function ($className) {
    include_once PATH_BACKEND . $className . '.php';
});

//Input redirector
require_once PATH_CONFIG . DS . 'input-redirector.php';

?>