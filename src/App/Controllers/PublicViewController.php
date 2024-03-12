<?php

declare(strict_types=1);

namespace App\Controllers;
use Modules\TemplateEngine;
use App\Config\Site;
use Modules\Website;

class PublicViewController
{
    public static function home()
    {



        TemplateEngine::init(Site::PUBLICVIEWS);

        echo TemplateEngine::render('home.php', [
            'title' => 'Home',
        ]);
    }

    public static function about()
    {

        TemplateEngine::init(Site::PUBLICVIEWS);

        echo TemplateEngine::render('about.php', [
            'title' => 'About',
        ]);

    }

    public static function contact()
    {

        TemplateEngine::init(Site::PUBLICVIEWS);

        echo TemplateEngine::render('contact.php', [
            'title' => 'Contact',
        ]);

    }

    public static function isLoggedIn(): bool
    {
        return Website::getIsAuthenticated();
    }

}
