<?php

declare(strict_types=1);

namespace App\Config;

class Routes
{

    // routes with corresponding methods in their respective controller
    const ROUTES = [
        // home routes
        '' => 'index',
        '/' => 'index',

        // auth routes
        '/auth/login' => 'login',
//        '/auth/register' => 'register',
        '/auth/logout' => 'logout',
//        '/auth/forgotPassword' => 'forgotPassword',

        // app routes
        '/app' => 'appHome',
        '/app/home' => 'appHome',
        '/app/about' => 'appAbout',
        '/app/contact' => 'appContact',

        // app sub routes
        //college routes
        '/app/college' => 'index',
        '/app/college/{id}' => 'view',

        // add of below will end up on view method
        // view method needs to filter the value and redirect to appropriate method
        '/app/college/add' => 'add',
        '/app/college/edit/{id}' => 'edit',
        '/app/college/delete/{id}' => 'delete',

        //branch routes
        '/app/branch' => 'index',
        '/app/branch/{id}' => 'view',
        '/app/branch/add' => 'add',
        '/app/branch/edit/{id}' => 'edit',
        '/app/branch/delete/{id}' => 'delete',

        //faculty routes
        '/app/faculty' => 'index',
        '/app/faculty/{id}' => 'view',
        '/app/faculty/add' => 'add',
        '/app/faculty/edit/{id}' => 'edit',
        '/app/faculty/delete/{id}' => 'delete',

        //duration routes
        '/app/duration' => 'index',
        '/app/duration/{id}' => 'view',
        '/app/duration/add' => 'add',
        '/app/duration/edit/{id}' => 'edit',
        '/app/duration/delete/{id}' => 'delete',

        //course routes
        '/app/course' => 'index',
        '/app/course/{id}' => 'view',
        '/app/course/add' => 'add',
        '/app/course/edit/{id}' => 'edit',
        '/app/course/delete/{id}' => 'delete',

        //session routes
        '/app/session' => 'index',
        '/app/session/{id}' => 'view',
        '/app/session/add' => 'add',
        '/app/session/edit/{id}' => 'edit',
        '/app/session/delete/{id}' => 'delete',

        //unit routes
        '/app/unit' => 'index',
        '/app/unit/{id}' => 'view',
        '/app/unit/add' => 'add',
        '/app/unit/edit/{id}' => 'edit',
        '/app/unit/delete/{id}' => 'delete',

        //term routes
        '/app/term' => 'index',
        '/app/term/{id}' => 'view',
        '/app/term/add' => 'add',
        '/app/term/edit/{id}' => 'edit',
        '/app/term/delete/{id}' => 'delete',

        //scholarship routes
        '/app/scholarship' => 'index',
        '/app/scholarship/{id}' => 'view',
        '/app/scholarship/add' => 'add',
        '/app/scholarship/edit/{id}' => 'edit',
        '/app/scholarship/delete/{id}' => 'delete',

        //notification routes
        '/app/notification' => 'index',
        '/app/notification/{id}' => 'view',
        '/app/notification/add' => 'add',
        '/app/notification/edit/{id}' => 'edit',
        '/app/notification/delete/{id}' => 'delete',

        //application routes
        '/app/application' => 'index',
        '/app/application/{id}' => 'view',
        '/app/application/add' => 'add',
        '/app/application/edit/{id}' => 'edit',
        '/app/application/delete/{id}' => 'delete',

        //student routes
        '/app/student' => 'index',
        '/app/student/{id}' => 'view',
        '/app/student/add' => 'add',
        '/app/student/edit/{id}' => 'edit',
        '/app/student/delete/{id}' => 'delete',

        // api routes
        // both the following routes will call the same method
        // but the second route will add extra trailing url string and in an associative array with key request
        'api/v1' => 'processV1',
        'api/v1/{request}' => 'processV1',



    ];

}

