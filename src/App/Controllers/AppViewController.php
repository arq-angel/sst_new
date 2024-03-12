<?php

declare(strict_types=1);

namespace App\Controllers;
use App\Config\Site;
use Modules\TemplateEngine;

class AppViewController
{

    public static function appHome()
    {

        TemplateEngine::init(Site::APPVIEWS);

        echo TemplateEngine::render('appHome.php', [
            'title' => 'SST Home',
        ]);
    }

    public function appAbout()
    {
        echo 'This is the about page.';
    }

    public function appContact()
    {
        echo 'This is the about page.';
    }

}
