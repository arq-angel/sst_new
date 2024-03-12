<?php

    define('DS', '/');

    define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

    const SERVER = [
        'db_host' => 'localhost',
        'db_username' => 'root',
        'db_password' => '',
        'db_name' => 'sst001-01'
    ];

    const APP = [
        'name' => 'SST',
        'version' => '0.0',
        'author' => 'Arjun Thapa Magar',
        'description' => 'PHP based web application.',
        'release_date' => '2024-02-20',
        'website' => ''
    ];

    const RES = [

        //ROOT LEVEL TRAILING URLS
        'home' => 'home',
        'about' => 'about',
        'contact' => 'contact',

        //AUTH LEVEL TRAILING URLS
        'login' => 'login',
        'register' => 'register',
        'forgotPass' => 'forgotPass',

        //LOGOUT URL
        'logout' => 'logout',

        //APP LEVEL TRALIING URLS
        'a_home' => 'home',
        'a_dashboard' => 'dashboard',
        'a_profile' => 'profile',

        //ADDITIONAL TRALIING URL NAMES
        'add' => 'add',
        'view' => 'view',
        'edit' => 'edit',
        'delete' => 'delete',

        //ROOT DIRECTORY FOLDER NAMES
        'public' => 'public',
        'src' => 'src',

        //PUBLIC DIRECTORY FOLDER NAMES
        'assets' => 'assets',
        'includes' => 'includes',

        //SRC DIRECTORY FOLDER NAMES
        'app' => 'app',
        'auth' => 'auth',
        'config' => 'config',
        'modules' => 'modules',
        'views' => 'views',

        //ROOT LEVEL INCLUDES DIRECTORY FILE NAMES
        'header' => 'header.php',
        'footer' => 'footer.php',

        //APP DIRECTORY FOLDER NAMES
        'a_includes' => 'includes',
        'a_views' => 'views',

        //APP LEVEL INCLUDES DIRECOTRY FILE NAMES
        'a_Header' => 'adminHeader.php',
        'a_footer' => 'adminFooter.php',

        //VIEW DIRECTORY WITHIN APP DIRECTORY FOLDER NAMES
        //ALSO APP LEVEL TRALING URLS
        'colleges' => 'colleges',
        'courses' => 'courses',
        'terms' => 'terms',
        'sessions' => 'sessions',
        'applications' => 'applications',
        'branches' => 'branches',
        'crm' => 'crm',
        'institutions' => 'institutions',
        'logs' => 'logs',
        'notifications' => 'notifications',
        'subjects' => 'subjects',
        'users' => 'users',
        'usertypes' => 'usertypes',
        'members' => 'members',

        //DATBASE MESSAGES
        'db_read' => 'read',

    ];

//    var_dump(SITE_ROOT);
//    var_dump(SERVER);
//    var_dump(APP);
//    var_dump(RES);

?>
