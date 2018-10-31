<?php

$url = explode('/', $_GET["url"]);

require 'controllers/'.$url[0].'.php';
$controller = new $url[0];

if (isset($url[1]))
    $controller->{$url[1]};
?>