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
        //session is already active in Router.php
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }


        TemplateEngine::init(Site::APPVIEWS);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // check for csrfToken validation
            $token = htmlspecialchars($_POST['token']);

            if (CsrfProtection::validateToken($token)) {
                // The form was submitted, token is validated, now handle login logic
                AuthService::loginService();
            } else {
                self::loadPage(
                    'appLogin.php',
                    'Log In',
                    ['errorMessage' => 'Invalid token! Please try again!']
                );

//                // destroy previous token
//                CsrfProtection::getDestroyToken();
//
//                // initiate the csrfToken
//                CsrfProtection::generateToken();
//
//                $csrfToken = CsrfProtection::getToken();
//                // The form wasn't submitted, render the login page with an error message
//                echo TemplateEngine::render('appLogin.php', [
//                    'title' => 'Log In',
//                    'csrfToken' => $csrfToken,
//                    'message' => [
//                        'errorMessage' => 'Invalid token! Please try again!'
//                    ],
//                ]);
            }
        } else {
            self::loadPage('appLogin.php', 'Log In');

//            // initiate the csrfToken
//            CsrfProtection::generateToken();
//
//            $csrfToken = CsrfProtection::getToken();
//
//            // The form wasn't submitted, render the login page
//            echo TemplateEngine::render('appLogin.php', [
//                'title' => 'Log In',
//                'csrfToken' => $csrfToken,
//            ]);
        }
    }

    public static function register()
    {
        //session is already active in Router.php
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }


        TemplateEngine::init(Site::APPVIEWS);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // check for csrfToken validation
            $token = htmlspecialchars($_POST['token']);

            if (htmlspecialchars($_POST['userPassword']) !== htmlspecialchars($_POST['confirmUserPassword'])) {
                self::loadPage(
                    'appRegister.php',
                    'Register',
                    ['errorMessage' => "Passwords don't match! Please try again"]
                );

//                // destroy previous token
//                CsrfProtection::getDestroyToken();
//
//                // initiate the csrfToken
//                CsrfProtection::generateToken();
//
//                $csrfToken = CsrfProtection::getToken();
//                // The form wasn't submitted, render the login page with an error message
//                echo TemplateEngine::render('appRegister.php', [
//                    'title' => 'Register',
//                    'csrfToken' => $csrfToken,
//                    'message' => [
//                        'errorMessage' => "Passwords don't match! Please try again"
//                    ],
//                ]);
            } elseif (CsrfProtection::validateToken($token)) {
                // The form was submitted, token is validated, now handle login logic
//                dd($_POST);
                AuthService::registerService();
                if (AuthService::registerService()) {
                    header('Location: ' . Site::ROOT_URL . '/auth/login');
                } else {
                    self::loadPage(
                        'appRegister.php',
                        'Register',
                        ['errorMessage' => "Could not create account! Please try again!"]
                    );


//                    // destroy previous token
//                    CsrfProtection::getDestroyToken();
//
//                    // initiate the csrfToken
//                    CsrfProtection::generateToken();
//
//                    $csrfToken = CsrfProtection::getToken();
//                    // The form wasn't submitted, render the login page with an error message
//                    echo TemplateEngine::render('appRegister.php', [
//                        'title' => 'Register',
//                        'csrfToken' => $csrfToken,
//                        'message' => [
//                            'errorMessage' => 'Could not create account! Please try again!'
//                        ],
//                    ]);
                }
            } else {
                self::loadPage(
                    'appRegister.php',
                    'Register',
                    ['errorMessage' => "Invalid token! Please try again!"]
                );


//                // destroy previous token
//                CsrfProtection::getDestroyToken();
//
//                // initiate the csrfToken
//                CsrfProtection::generateToken();
//
//                $csrfToken = CsrfProtection::getToken();
//                // The form wasn't submitted, render the login page with an error message
//                echo TemplateEngine::render('appRegister.php', [
//                    'title' => 'Register',
//                    'csrfToken' => $csrfToken,
//                    'message' => [
//                        'errorMessage' => 'Invalid token! Please try again!'
//                    ],
//                ]);
            }
        } else {

            self::loadPage(
                'appRegister.php',
                'Register',
            );

//            // initiate the csrfToken
//            CsrfProtection::generateToken();
//
//            $csrfToken = CsrfProtection::getToken();
//
//            // The form wasn't submitted, render the login page
//            echo TemplateEngine::render('appRegister.php', [
//                'title' => 'Register',
//                'csrfToken' => $csrfToken,
//            ]);
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

//            // destroy previous token
//            CsrfProtection::getDestroyToken();
//
//            // initiate the csrfToken
//            CsrfProtection::generateToken();
//
//            $csrfToken = CsrfProtection::getToken();
//            // The form wasn't submitted, render the login page with an error message
//            echo TemplateEngine::render('appLogout.php', [
//                'title' => 'Log Out',
//                'csrfToken' => $csrfToken,
//                'message' => [
//                    'successMessage' => 'You are logged out!'
//                ],
//            ]);
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

    public static function forgotPassword()
    {
        TemplateEngine::init(Site::APPVIEWS);

        echo TemplateEngine::render('appForgotPassword.php', [
            'title' => 'Forgot Password',
        ]);
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
