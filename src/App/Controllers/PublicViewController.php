<?php

declare(strict_types=1);

namespace App\Controllers;
use Modules\Services\AuthService;
use Modules\Services\CsrfProtection;
use Modules\TemplateEngine;
use App\Config\Site;
use Modules\Website;

class PublicViewController
{
    public static function index()
    {

        header("Location: http://sst.cc/auth/login");
        exit;

    }

}
