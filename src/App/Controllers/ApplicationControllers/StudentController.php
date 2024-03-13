<?php

declare(strict_types=1);

namespace App\Controllers\ApplicationControllers;

use App\Config\Site;
use App\Controllers\ViewControllers\ViewController;
use Modules\CRUD\CreateRecord;
use Modules\CRUD\StudentCreateRecord;
use Modules\Services\CsrfProtection;
use Modules\Services\ValidateStudentForm;

class StudentController
{

    public static function index()
    {
        ViewController::loadViewController([
            'action' => 'viewAll',
            'pageName' => 'student'
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

                $validationResult = ValidateStudentForm::loadValidateStudentForm([
                    'controller' => 'student',
                    'data' => $data,
                ]);

                $errors = $validationResult['errors'];

                // $data with studentId added in ValidateStudentForm
                $data = $validationResult['data'];

                dd($errors);

                if (!$errors) {
                    $result = StudentCreateRecord::loadStudentCreateRecord('student', $data);

                    if ($result) {
                        header('Location: ' . Site::ROOT_URL . '/app/student');
                        exit;
                    }  else {
                        self::renderStudent([
                            'data' => $data,
                            'errors' => [
                                'errorMessage' => 'Could not create record, try again!'
                            ],
                        ]);
                    }
                } else {
                    self::renderStudent([
                        'data' => $data,
                        'errors' => $errors,
                    ]);
                }

            } else {
                self::renderStudent([
                    'errors' => [
                        'errorMessage' => 'Invalid token! please fill the form again'
                    ]
                ]);
            }
        } else {
            self::renderStudent();
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

    public static function renderStudent(array $params = [])
    {

        $data = $params['data'] ?? [];
        $errors = $params['errors'] ?? [];

        // initiate the csrfToken
        CsrfProtection::generateToken();

        $csrfToken = CsrfProtection::getToken();

        ViewController::loadViewController([
            'action' => 'add',
            'pageName' => 'student',
            'csrfToken' => $csrfToken,
            'data' => $data,
            'errors' => $errors,
        ]);
    }

}
