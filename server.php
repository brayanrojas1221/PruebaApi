<?php

$uri = parse_url(str_replace("/" . PROJECT_NAME, "", $_SERVER['REQUEST_URI']), PHP_URL_PATH);

$routes = [
    "/login" => "\APP\Modules\Login\Controller::index",
];

if (!isset($routes[$uri])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

if ($uri != "/login" && !isset($_SESSION['user'])) {
    header("Location: /chexter/login");
    exit();
}

list($class, $method) = explode("::", $routes[$uri]);

global $views_path; $views_path = __DIR__ . str_replace([ "\\", 'controller' ], [ "/", "views/" ], strtolower($class));
function render($view, $data = []) {
    global $views_path;
    extract($data);
    require_once $views_path . "/" . $view . ".php";
    exit();
}

function json($data) {
    header("Content-Type: application/json");
    echo json_encode($data);
    exit();
}

require_once __DIR__ . str_replace("\\", "/", strtolower($class)) . ".php";

$class::$method();
