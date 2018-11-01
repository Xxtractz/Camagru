<?php
    session_start();
    define("DS", DIRECTORY_SEPARATOR);
    define("ROOT", dirname(__FILE__));
    $path = $_SERVER["PATH_INFO"];
    $url = isset($path) ? explode('/', ltrim($path, '/')) : [];
    require_once(ROOT . DS. 'core'. DS . 'bootstrap.php');