<?php

declare(strict_types=1);

namespace App;

use App\Controllers\RouterController;


class App
{
    private static function runApp(): void
    {

        RouterController::createRoutes();
    }

    public static function getRunApp(): void
    {
        self::runApp();

    }

}
