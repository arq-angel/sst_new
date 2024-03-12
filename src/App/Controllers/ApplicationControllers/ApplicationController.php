<?php

declare(strict_types=1);

namespace App\Controllers\ApplicationControllers;

use App\Controllers\ViewControllers\ViewController;
use Modules\CRUD\CreateRecord;
use Modules\Services\CsrfProtection;

class ApplicationController
{

    public static function index()
    {
        echo "index";
    }

    public static function view(array $params)
    {
        if ($params['id'] === 'add') {
            self::add();
        }

        if (is_int($params['id'])) {
            echo "ID:" . $params['id'];
        }
    }

    public static function add()
    {
        echo "add";
    }

    public static function edit(array $params)
    {
        echo "edit";
    }

    public static function delete(array $params)
    {
        echo "delete";
    }


}
