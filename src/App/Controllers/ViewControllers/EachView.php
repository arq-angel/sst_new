<?php

declare(strict_types=1);

namespace App\Controllers\ViewControllers;
use Modules\HelperWebsite;

class EachView
{

    public static function createEachView(array $params) {

//        return "load view for " . $params['id'];

        $controller = $params['controller'];
        $id = $params['id'];
        $eachData = HelperWebsite::getEachRecord($controller, $id);

        var_dump($eachData);

    }

}
