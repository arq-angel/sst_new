<?php

declare(strict_types=1);

namespace App\Controllers\FormControllers;

use App\Config\Site;
use App\Controllers\ViewControllers\ViewController;
use Modules\CRUD\CreateRecord;
use Modules\Services\CsrfProtection;
use Modules\Services\ValidateForm;

class ScholarshipController
{

    public static function index()
    {

        ViewController::loadViewController([
            'action' => 'viewAll',
            'pageName' => 'scholarship'
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
                    'controller' => 'scholarship',
                    'data' => $data,
                ]);

                if (!$errors) {
                    $result = CreateRecord::loadCreateRecord('scholarship', $data);

                    if ($result) {
                        header('Location: ' . Site::ROOT_URL . '/app/scholarship');
                        exit;
                    }
                } else {
                    self::renderScholarship([
                        'data' => $data,
                        'errors' => $errors,
                    ]);
                }

            } else {
                self::renderScholarship([
                    'errors' => [
                        'errorMessage' => 'Invalid token! please fill the form again'
                    ]
                ]);
            }
        } else {
            self::renderScholarship();
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

    public static function renderScholarship(array $params = [])
    {

        $data = $params['data'] ?? [];
        $errors = $params['errors'] ?? [];

        // initiate the csrfToken
        CsrfProtection::generateToken();

        $csrfToken = CsrfProtection::getToken();

        ViewController::loadViewController([
            'action' => 'add',
            'pageName' => 'scholarship',
            'csrfToken' => $csrfToken,
            'data' => $data,
            'errors' => $errors,
        ]);
    }

}
