<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\Controllers;
use App\Config\Routes;
use Modules\Router;

class RouterController
{

    public static function createRoutes()
    {

        foreach (Routes::ROUTES as $urlPath => $urlMethod) {

            if (array_key_exists($urlPath, Controllers::CORRESCONTROLLERS)) {
                $urlController = Controllers::CORRESCONTROLLERS[$urlPath];

//                dd($urlController);
                // Define Routes
                Router::addRoute($urlPath, $urlController, $urlMethod);

            } else {
                return "Invalid url link";
            }
        }

//        dd(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));


        // Get the current URL and sanitize and trim
        $currentUrl = htmlspecialchars(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), ENT_QUOTES, 'UTF-8');
        $currentUrl = rtrim(preg_replace('#/+#', '/', $currentUrl), '/');

        // Dispatch the request
        Router::dispatch($currentUrl);
    }

}
