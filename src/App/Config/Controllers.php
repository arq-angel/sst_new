<?php

declare(strict_types=1);

namespace App\Config;

class Controllers
{

    // Define the namespace
    const CONTROLLER_NAMESPACE = 'App\\Controllers\\';

    const AUTHCONTROLLER_NAMESPACE = 'App\\Controllers\\AuthControllers\\';

    const FORMCONTROLLER_NAMESPACE = 'App\\Controllers\\FormControllers\\';

    const APPLICATIONCONTROLLER_NAMESPACE = 'App\\Controllers\\ApplicationControllers\\';

    const APICONTROLLER_NAMESPACE = 'App\\Controllers\\APIControllers\\';

    const APICONTROLLERV1_NAMESPACE = 'App\\Controllers\\APIControllers\\APIControllerV1\\';

    const CONTROLLERS = [
        'PublicViewController' => 'PublicViewController',

        'AppViewController' => 'AppViewController',
        'AuthController' => 'AuthController',

        'CollegeController' => 'CollegeController',
        'BranchController' => 'BranchController',
        'FacultyController' => 'FacultyController',
        'DurationController' => 'DurationController',
        'CourseController' => 'CourseController',
        'SessionController' => 'SessionController',
        'UnitController' => 'UnitController',
        'TermController' => 'TermController',
        'ScholarshipController' => 'ScholarshipController',
        'NotificationController' => 'NotificationController',

        'ApplicationController' => 'ApplicationController',
        'StudentController' => 'StudentController',

        // API Controllers
        'APIControllerV1' => 'APIControllerV1',
    ];

    const PUBLICCONTROLLERS = [
        self::CONTROLLER_NAMESPACE . self::CONTROLLERS['PublicViewController'],
    ];

    const AUTHCONTROLLERS = [
        self::AUTHCONTROLLER_NAMESPACE . self::CONTROLLERS['AuthController'],
    ];

    const SECUREDCONTROLLERS = [
        self::CONTROLLER_NAMESPACE . self::CONTROLLERS['AppViewController'],

        self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['CollegeController'],
        self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['BranchController'],
        self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['FacultyController'],
        self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['DurationController'],
        self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['CourseController'],
        self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['SessionController'],
        self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['UnitController'],
        self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['TermController'],
        self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['ScholarshipController'],
        self::FORMCONTROLLER_NAMESPACE .  self::CONTROLLERS['NotificationController'],

        self::APPLICATIONCONTROLLER_NAMESPACE . self::CONTROLLERS['ApplicationController'],
        self::APPLICATIONCONTROLLER_NAMESPACE . self::CONTROLLERS['StudentController'],
    ];

    const APICONTROLLERS = [
        self::APICONTROLLERV1_NAMESPACE . self::CONTROLLERS['APIControllerV1'],
    ];



    // corresponding Controllers for url parsed paths
    const CORRESCONTROLLERS = [
        // home routes
        '' => self::CONTROLLER_NAMESPACE . self::CONTROLLERS['PublicViewController'],
        '/' => self::CONTROLLER_NAMESPACE . self::CONTROLLERS['PublicViewController'],

        // auth routes
        '/auth/login' => self::AUTHCONTROLLER_NAMESPACE . self::CONTROLLERS['AuthController'],
//        '/auth/register' => self::AUTHCONTROLLER_NAMESPACE . self::CONTROLLERS['AuthController'],
        '/auth/logout' => self::AUTHCONTROLLER_NAMESPACE . self::CONTROLLERS['AuthController'],
//        '/auth/forgotPassword' => self::AUTHCONTROLLER_NAMESPACE . self::CONTROLLERS['AuthController'],

        // app routes
        '/app' => self::CONTROLLER_NAMESPACE . self::CONTROLLERS['AppViewController'],
        '/app/home' => self::CONTROLLER_NAMESPACE . self::CONTROLLERS['AppViewController'],
        '/app/about' => self::CONTROLLER_NAMESPACE . self::CONTROLLERS['AppViewController'],
        '/app/contact' => self::CONTROLLER_NAMESPACE . self::CONTROLLERS['AppViewController'],

        // app sub routes
        //college routes
        '/app/college' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['CollegeController'],
        '/app/college/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['CollegeController'],
        '/app/college/add' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['CollegeController'],
        '/app/college/edit/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['CollegeController'],
        '/app/college/delete/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['CollegeController'],

        //branch routes
        '/app/branch' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['BranchController'],
        '/app/branch/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['BranchController'],
        '/app/branch/add' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['BranchController'],
        '/app/branch/edit/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['BranchController'],
        '/app/branch/delete/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['BranchController'],

        //faculty routes
        '/app/faculty' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['FacultyController'],
        '/app/faculty/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['FacultyController'],
        '/app/faculty/add' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['FacultyController'],
        '/app/faculty/edit/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['FacultyController'],
        '/app/faculty/delete/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['FacultyController'],

        //duration routes
        '/app/duration' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['DurationController'],
        '/app/duration/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['DurationController'],
        '/app/duration/add' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['DurationController'],
        '/app/duration/edit/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['DurationController'],
        '/app/duration/delete/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['DurationController'],

        //course routes
        '/app/course' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['CourseController'],
        '/app/course/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['CourseController'],
        '/app/course/add' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['CourseController'],
        '/app/course/edit/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['CourseController'],
        '/app/course/delete/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['CourseController'],

        //session routes
        '/app/session' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['SessionController'],
        '/app/session/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['SessionController'],
        '/app/session/add' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['SessionController'],
        '/app/session/edit/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['SessionController'],
        '/app/session/delete/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['SessionController'],

        //unit routes
        '/app/unit' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['UnitController'],
        '/app/unit/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['UnitController'],
        '/app/unit/add' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['UnitController'],
        '/app/unit/edit/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['UnitController'],
        '/app/unit/delete/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['UnitController'],

        //term routes
        '/app/term' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['TermController'],
        '/app/term/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['TermController'],
        '/app/term/add' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['TermController'],
        '/app/term/edit/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['TermController'],
        '/app/term/delete/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['TermController'],

        //scholarship routes
        '/app/scholarship' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['ScholarshipController'],
        '/app/scholarship/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['ScholarshipController'],
        '/app/scholarship/add' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['ScholarshipController'],
        '/app/scholarship/edit/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['ScholarshipController'],
        '/app/scholarship/delete/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['ScholarshipController'],

        //notification routes
        '/app/notification' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['NotificationController'],
        '/app/notification/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['NotificationController'],
        '/app/notification/add' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['NotificationController'],
        '/app/notification/edit/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['NotificationController'],
        '/app/notification/delete/{id}' => self::FORMCONTROLLER_NAMESPACE . self::CONTROLLERS['NotificationController'],

        //application routes
        '/app/application' => self::APPLICATIONCONTROLLER_NAMESPACE . self::CONTROLLERS['ApplicationController'],
        '/app/application/{id}' => self::APPLICATIONCONTROLLER_NAMESPACE . self::CONTROLLERS['ApplicationController'],
        '/app/application/add' => self::APPLICATIONCONTROLLER_NAMESPACE . self::CONTROLLERS['ApplicationController'],
        '/app/application/edit/{id}' => self::APPLICATIONCONTROLLER_NAMESPACE . self::CONTROLLERS['ApplicationController'],
        '/app/application/delete/{id}' => self::APPLICATIONCONTROLLER_NAMESPACE . self::CONTROLLERS['ApplicationController'],

        //student routes
        '/app/student' => self::APPLICATIONCONTROLLER_NAMESPACE . self::CONTROLLERS['StudentController'],
        '/app/student/{id}' => self::APPLICATIONCONTROLLER_NAMESPACE . self::CONTROLLERS['StudentController'],
        '/app/student/add' => self::APPLICATIONCONTROLLER_NAMESPACE . self::CONTROLLERS['StudentController'],
        '/app/student/edit/{id}' => self::APPLICATIONCONTROLLER_NAMESPACE . self::CONTROLLERS['StudentController'],
        '/app/student/delete/{id}' => self::APPLICATIONCONTROLLER_NAMESPACE . self::CONTROLLERS['StudentController'],


        'api/v1' => self::APICONTROLLERV1_NAMESPACE . self::CONTROLLERS['APIControllerV1'],
        'api/v1/{request}' => self::APICONTROLLERV1_NAMESPACE . self::CONTROLLERS['APIControllerV1'],

        ];



}
