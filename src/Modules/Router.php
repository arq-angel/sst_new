<?php

declare(strict_types=1);

namespace Modules;

use App\Config\Controllers;
use App\Controllers\PublicViewController;
use Modules\Middlewares\AuthMiddleware;

class Router
{
    protected static $routes = [];

    public static function findRoutes(): array
    {
        return self::$routes;
    }

    // Define a route with parameters
    public static function addRoute($url, $controller, $action, $params = [])
    {
        self::$routes[$url] = ['controller' => $controller, 'action' => $action, 'params' => $params];
    }

    // Match the URL to a route and dispatch to the corresponding controller/action
    public static function dispatch($url)
    {

//        dd($url);
        $urlParts = explode('/', trim($url, '/'));

        foreach (self::$routes as $route => $config) {
            $routeParts = explode('/', trim($route, '/'));

            if (count($urlParts) == count($routeParts)) {
                $params = [];
                $match = true;

                foreach ($routeParts as $key => $part) {
                    if (!empty($part) && $part[0] == '{' && $part[strlen($part) - 1] == '}') {
                        $paramName = substr($part, 1, -1);
                        $params[$paramName] = $urlParts[$key];
                    } elseif ($part != $urlParts[$key]) {
                        $match = false;
                        break;
                    }
                }

                if ($match) {

                    $urlController = $config['controller'];
                    $action = $config['action'];

//                    dd($urlController);
//                    dd($action);

                    session_start();

                    if (in_array($urlController, Controllers::PUBLICCONTROLLERS)) {
                        $controller = $urlController;
                        $controller::$action($params);
                    }

                    if (in_array($urlController, Controllers::AUTHCONTROLLERS)) {
                        $controller = $urlController;
                        $controller::$action($params);
                    }

                    //adding AuthMiddleware to the SECUREDCONTROLLERS
                    if (in_array($urlController, Controllers::SECUREDCONTROLLERS)) {
                        AuthMiddleware::checkLogin(function () use ($urlController, $action, $params) {
                            $controller = $urlController;
                            $controller::$action($params);
                        });
                    }

                    if (in_array($urlController, Controllers::APICONTROLLERS)) {
//                        dd($urlController);
                        $controller = $urlController;
                        $controller::$action($params);
                    }

                    return;
                }
            }
        }

        // Handle 404 Not Found
        http_response_code(404);
        include( __DIR__ . '/../../public/views/404.html');
    }
}

