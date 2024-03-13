<?php

declare(strict_types=1);

namespace App\Controllers\AuthControllers;

use App\Config\Site;
use Modules\Services\{AuthService, CsrfProtection};
use Modules\TemplateEngine;

class AuthController
{
    public static function login()
    {

//        dd($_SESSION);
        //session is already active in Router.php
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        TemplateEngine::init(Site::APPVIEWS);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // check for csrfToken validation
            $token = htmlspecialchars($_POST['token']);

            if (CsrfProtection::validateToken($token)) {
                AuthService::loginService();
            } else {
                self::loadPage(
                    'appLogin.php',
                    'Log In',
                    ['errorMessage' => 'Invalid token! Please try again!']
                );
            }
        } else {
            self::loadPage('appLogin.php', 'Log In');
        }
    }

    public static function logout()
    {
        //session is already active in Router.php
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        TemplateEngine::init(Site::APPVIEWS);

        if (AuthService::logoutService()) {

            self::loadPage(
                'appLogout.php',
                'Log Out',
                ['successMessage' => 'You are logged out!']
            );
        } else {
            TemplateEngine::init(Site::APPVIEWS);

            echo TemplateEngine::render('errorPage.php', [
                'title' => 'Log Out',
                'message' => [
                    'errorMessage' => 'We could not log you out. Please try again'
                ],
            ]);
        }
    }

    public static function loadPage(string $pageName, string $title, array $messages = []): void
    {
        // destroy previous token
        CsrfProtection::getDestroyToken();

        // initiate the csrfToken
        CsrfProtection::generateToken();

        $csrfToken = CsrfProtection::getToken();
        // The form wasn't submitted, render the login page with an error message
        echo TemplateEngine::render($pageName, [
            'title' => $title,
            'csrfToken' => $csrfToken,
            'message' => [
                'errorMessage' => $messages['errorMessage'] ?? '',
                'successMessage' => $messages['successMessage'] ?? '',
            ],
        ]);
    }

}
