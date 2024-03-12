<?php

declare(strict_types=1);

namespace App\Controllers\FormControllers;

use App\Config\Site;
use App\Controllers\ViewControllers\ViewController;
use Modules\Services\AuthService;
use Modules\Services\CsrfProtection;
use Modules\CRUD\CreateRecord;
use Modules\Services\ValidateForm;

class CollegeController
{

    public static function index()
    {

        ViewController::loadViewController([
            'action' => 'viewAll',
            'pageName' => 'college'
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
                    'controller' => 'college',
                    'data' => $data,
                ]);

                if (!$errors) {
                    $result = CreateRecord::loadCreateRecord('college', $data);

                    if ($result) {
                        header('Location: ' . Site::ROOT_URL . '/app/college');
                        exit;
                    }
                } else {
                    self::renderCollege([
                        'data' => $data,
                        'errors' => $errors,
                    ]);
                }

            } else {
                self::renderCollege([
                    'errors' => [
                        'errorMessage' => 'Invalid token! please fill the form again'
                    ]
                ]);
            }
        } else {
            self::renderCollege();
        }

    }

    public static function edit(array $params)
    {
        echo "edit";
    }

    public static function delete(array $params)
    {
        // http://mvc.cc/app/student/delete/5?page=1&no=3
//        $page = isset($_GET['page']) ? $_GET['page'] : null;
//        $no = isset($_GET['no']) ? $_GET['no'] : null;
//
//        echo "Page: " . $page;
//        echo "No: " . $no;
//        dd($params);
        echo "delete";
    }

    public static function renderCollege(array $params = [])
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
