<?php

declare(strict_types=1);

namespace App\Controllers\FormControllers;

use App\Config\Site;
use App\Controllers\ViewControllers\ViewController;
use Modules\CRUD\CreateRecord;
use Modules\Services\CsrfProtection;

class BranchController
{

    public static function index()
    {

        ViewController::loadViewController([
            'action' => 'viewAll',
            'pageName' => 'branch'
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
                // The form was submitted, token is validated, now handle login logic

//                dd($_POST);
                $result = CreateRecord::loadCreateRecord('branch');

                if ($result) {
                    header('Location: ' . Site::ROOT_URL . '/app/branch');
                    exit;
                }

            } else {

                // destroy previous token
                CsrfProtection::getDestroyToken();

                // initiate the csrfToken
                CsrfProtection::generateToken();

                $csrfToken = CsrfProtection::getToken();

                ViewController::loadViewController([
                    'action' => 'add',
                    'pageName' => 'branch',
                    'csrfToken' => $csrfToken,

                ]);
            }
        } else {
            // initiate the csrfToken
            CsrfProtection::generateToken();

            $csrfToken = CsrfProtection::getToken();

            ViewController::loadViewController([
                'action' => 'add',
                'pageName' => 'branch',
                'csrfToken' => $csrfToken,

            ]);

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

    public static function renderBranch(array $params = [])
    {

        $data = $params['data'] ?? [];
        $errors = $params['errors'] ?? [];

        // initiate the csrfToken
        CsrfProtection::generateToken();

        $csrfToken = CsrfProtection::getToken();

        ViewController::loadViewController([
            'action' => 'add',
            'pageName' => 'college',
            'csrfToken' => $csrfToken,
            'data' => $data,
            'errors' => $errors,
        ]);
    }

}
