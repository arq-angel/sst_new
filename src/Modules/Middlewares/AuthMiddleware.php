<?php

declare(strict_types=1);

namespace Modules\Middlewares;

class AuthMiddleware
{

    public static function checkLogin($callback) {

//        dd($_SESSION);
        // Check if user_id is stored in the session
        if (isset($_SESSION['authenticated_user'])) {
            // If logged in, execute the callback (controller method)
            call_user_func($callback);
        } else {
            // Redirect to login page
            redirectTo('/home');
            exit();
        }
    }

}
