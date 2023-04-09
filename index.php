<?php

require __DIR__ . '/app/init.php';

$routeExplode = explode('?', $_SERVER['REQUEST_URI']);
$route = array_values(array_filter(explode('/', $routeExplode[0])));
if (SUBFOLDER_NAME != '/') {
    array_shift($route);
}

if (!route(0)) {
    $route[0] = 'index';
}

if (!file_exists(controller(route(0)))) {
    $route[0] = '404';
}

if (setting('maintenance_mode') == 1 && route(0) != 'admin') {
    $route[0] = 'maintenance-mode';
}

require controller(route(0));
