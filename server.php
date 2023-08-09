<?php

use Routing\Infra\RouteScraper;

require_once __DIR__ . '/vendor/autoload.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$localizationRoutes = __DIR__ . '/../src/Controller';
$routesList = (new RouteScraper($localizationRoutes))->getRoutes();

$routesMatch = array_filter(
    $routesList,
    fn($route) => $route->uri === $uri && $route->method->value === $method,
);

if (empty($routesMatch)) {
    http_response_code(404);
    exit();
}

$firstRoute = reset($routesMatch);
$instanceClass = new ($firstRoute->getOriginClass());

echo call_user_func([$instanceClass, $firstRoute->getOriginClassMethod()]);
