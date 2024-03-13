<?php

declare(strict_types=1);

namespace App\Controllers\ViewControllers;
use Modules\HelperWebsite;

class ApplicationEachView
{

    public static function createApplicationEachView(array $params) {

//        return "load view for " . $params['id'];

        $controller = $params['controller'];
        $id = $params['id'];
        $eachData = HelperWebsite::getEachRecord($controller, $id);

        var_dump($eachData);

    }

}
