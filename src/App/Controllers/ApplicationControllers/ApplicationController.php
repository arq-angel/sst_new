<?php

declare(strict_types=1);

namespace App\Controllers\ApplicationControllers;

use App\Config\Site;
use App\Controllers\ViewControllers\ApplicationViewController;
use App\Controllers\ViewControllers\ViewController;
use Modules\CRUD\ApplicationCreateRecord;
use Modules\Services\AuthService;
use Modules\Services\CsrfProtection;
use Modules\CRUD\CreateRecord;
use Modules\Services\SearchService;
use Modules\Services\ValidateForm;

class ApplicationController
{

    public static function index()
    {
        // initiate the csrfToken
        CsrfProtection::generateToken();

        $csrfToken = CsrfProtection::getToken();


        ApplicationViewController::loadApplicationViewController([
            'action' => 'viewAll',
            'pageName' => 'viewApplication',
            'csrfToken' => $csrfToken,
        ]);

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
        //session is already active in Router.php
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // check for csrfToken validation
            $token = htmlspecialchars($_POST['token']);

            if (CsrfProtection::validateToken($token)) {

                // validate form data
                $data = $_POST;

                $errors = ValidateForm::loadValidateForm([
                    'controller' => 'addApplication',
                    'data' => $data,
                ]);

                if (!$errors) {
                    $result = ApplicationCreateRecord::loadApplicationCreateRecord('addApplication', $data);

                    if ($result) {
                        header('Location: ' . Site::ROOT_URL . '/app/application');
                        exit;
                    } else {
                        self::renderApplication([
                            'data' => $data,
                            'errors' => [
                                'errorMessage' => 'Could not create record, try again!'
                            ],
                        ]);
                    }
                } else {
                    self::renderApplication([
                        'data' => $data,
                        'errors' => $errors,
                    ]);
                }

            } else {
                self::renderApplication([
                    'errors' => [
                        'errorMessage' => 'Invalid token! please fill the form again'
                    ]
                ]);
            }
        } else {
            self::renderApplication();
        }

    }

    public static function edit(array $params)
    {
        echo "edit";
    }

    public static function delete(array $params)
    {
        echo "delete";
    }

    public static function renderApplication(array $params = [])
    {

        $data = $params['data'] ?? [];
        $errors = $params['errors'] ?? [];

        // initiate the csrfToken
        CsrfProtection::generateToken();

        $csrfToken = CsrfProtection::getToken();

        ApplicationViewController::loadApplicationViewController([
            'action' => 'add',
            'pageName' => 'addApplication',
            'csrfToken' => $csrfToken,
            'data' => $data,
            'errors' => $errors,
        ]);
    }

}
