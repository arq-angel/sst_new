<?php

    require_once "configs.php";

    define('ROOT_URL', 'http://sstone.cc');
    const ROUTES = [

        //public routes
        'home' => ROOT_URL . DS . RES['home'],
        'about' => ROOT_URL . DS . RES['about'],
        'contact' => ROOT_URL . DS . RES['contact'],

        //auth routes
        'auth' => ROOT_URL . DS . RES['auth'],

        //auth trailing routes
        'login' => ROOT_URL . DS . RES['auth'] . DS . RES['login'],
        'register' => ROOT_URL . DS . RES['auth']. DS . RES['register'],
        'forgotPass' => ROOT_URL . DS . RES['auth']. DS . RES['forgotPass'],

        //logout route
        'logout' => ROOT_URL . DS . RES['logout'],

        //app routes
        'app' => ROOT_URL . DS . RES['app'],

        //app navigation bar trailing routes
        'a_home' => ROOT_URL . DS . RES['app']. DS . RES['a_home'],
        'a_dashboard' => ROOT_URL . DS . RES['app']. DS . RES['a_dashboard'],
        'a_profile' => ROOT_URL . DS . RES['app']. DS . RES['a_profile'],

        //app side navigation bar trailing routes
        'colleges' => ROOT_URL . DS . RES['app']. DS . RES['colleges'],
        'courses' => ROOT_URL . DS . RES['app']. DS . RES['courses'],
        'terms' => ROOT_URL . DS . RES['app']. DS . RES['terms'],
        'sessions' => ROOT_URL . DS . RES['app']. DS . RES['sessions'],
        'applications' => ROOT_URL . DS . RES['app']. DS . RES['applications'],
        'branches' => ROOT_URL . DS . RES['app']. DS . RES['branches'],
        'crm' => ROOT_URL . DS . RES['app']. DS . RES['crm'],
        'institutions' => ROOT_URL . DS . RES['app']. DS . RES['institutions'],
        'logs' => ROOT_URL . DS . RES['app']. DS . RES['logs'],
        'notifications' => ROOT_URL . DS . RES['app']. DS . RES['notifications'],
        'subjects' => ROOT_URL . DS . RES['app']. DS . RES['subjects'],
        'users' => ROOT_URL . DS . RES['app']. DS . RES['users'],
        'usertypes' => ROOT_URL . DS . RES['app']. DS . RES['usertypes'],
        'members' => ROOT_URL . DS . RES['app']. DS . RES['members'],

        //additional actions on app side navigation urls
        //for college
        'addCollege' => ROOT_URL . DS . RES['app']. DS . RES['colleges'] . DS . RES['add'],
        'viewCollege' => ROOT_URL . DS . RES['app']. DS . RES['colleges'] . DS . RES['view'],
        'editCollege' => ROOT_URL . DS . RES['app']. DS . RES['colleges'] . DS . RES['edit'],
        'deleteCollege' => ROOT_URL . DS . RES['app']. DS . RES['colleges'] . DS . RES['delete'],

        // For Courses
        'addCourse' => ROOT_URL . DS . RES['app'] . DS . RES['courses'] . DS . RES['add'],
        'viewCourse' => ROOT_URL . DS . RES['app']. DS . RES['courses'] . DS . RES['view'],
        'editCourse' => ROOT_URL . DS . RES['app'] . DS . RES['courses'] . DS . RES['edit'],
        'deleteCourse' => ROOT_URL . DS . RES['app'] . DS . RES['courses'] . DS . RES['delete'],

        // For Sessions
        'addSession' => ROOT_URL . DS . RES['app'] . DS . RES['sessions'] . DS . RES['add'],
        'viewSession' => ROOT_URL . DS . RES['app']. DS . RES['sessions'] . DS . RES['view'],
        'editSession' => ROOT_URL . DS . RES['app'] . DS . RES['sessions'] . DS . RES['edit'],
        'deleteSession' => ROOT_URL . DS . RES['app'] . DS . RES['sessions'] . DS . RES['delete'],

        // For Terms
        'addTerm' => ROOT_URL . DS . RES['app'] . DS . RES['terms'] . DS . RES['add'],
        'viewTerm' => ROOT_URL . DS . RES['app']. DS . RES['terms'] . DS . RES['view'],
        'editTerm' => ROOT_URL . DS . RES['app'] . DS . RES['terms'] . DS . RES['edit'],
        'deleteTerm' => ROOT_URL . DS . RES['app'] . DS . RES['terms'] . DS . RES['delete'],

        // For Applications
        'addApplication' => ROOT_URL . DS . RES['app'] . DS . RES['applications'] . DS . RES['add'],
        'viewApplication' => ROOT_URL . DS . RES['app']. DS . RES['applications'] . DS . RES['view'],
        'editApplication' => ROOT_URL . DS . RES['app'] . DS . RES['applications'] . DS . RES['edit'],
        'deleteApplication' => ROOT_URL . DS . RES['app'] . DS . RES['applications'] . DS . RES['delete'],

        // For Branches
        'addBranch' => ROOT_URL . DS . RES['app'] . DS . RES['branches'] . DS . RES['add'],
        'viewBranch' => ROOT_URL . DS . RES['app']. DS . RES['branches'] . DS . RES['view'],
        'editBranch' => ROOT_URL . DS . RES['app'] . DS . RES['branches'] . DS . RES['edit'],
        'deleteBranch' => ROOT_URL . DS . RES['app'] . DS . RES['branches'] . DS . RES['delete'],

        // For CRM
        'addCRM' => ROOT_URL . DS . RES['app'] . DS . RES['crm'] . DS . RES['add'],
        'viewCRM' => ROOT_URL . DS . RES['app']. DS . RES['crm'] . DS . RES['view'],
        'editCRM' => ROOT_URL . DS . RES['app'] . DS . RES['crm'] . DS . RES['edit'],
        'deleteCRM' => ROOT_URL . DS . RES['app'] . DS . RES['crm'] . DS . RES['delete'],

        // For Institutions
        'addInstitution' => ROOT_URL . DS . RES['app'] . DS . RES['institutions'] . DS . RES['add'],
        'viewInstitution' => ROOT_URL . DS . RES['app']. DS . RES['institutions'] . DS . RES['view'],
        'editInstitution' => ROOT_URL . DS . RES['app'] . DS . RES['institutions'] . DS . RES['edit'],
        'deleteInstitution' => ROOT_URL . DS . RES['app'] . DS . RES['institutions'] . DS . RES['delete'],

        // For Notifications
        'addNotification' => ROOT_URL . DS . RES['app'] . DS . RES['notifications'] . DS . RES['add'],
        'viewNotification' => ROOT_URL . DS . RES['app']. DS . RES['notifications'] . DS . RES['view'],
        'editNotification' => ROOT_URL . DS . RES['app'] . DS . RES['notifications'] . DS . RES['edit'],
        'deleteNotification' => ROOT_URL . DS . RES['app'] . DS . RES['notifications'] . DS . RES['delete'],

        // For Subjects
        'addSubject' => ROOT_URL . DS . RES['app'] . DS . RES['subjects'] . DS . RES['add'],
        'viewSubject' => ROOT_URL . DS . RES['app']. DS . RES['subjects'] . DS . RES['view'],
        'editSubject' => ROOT_URL . DS . RES['app'] . DS . RES['subjects'] . DS . RES['edit'],
        'deleteSubject' => ROOT_URL . DS . RES['app'] . DS . RES['subjects'] . DS . RES['delete'],

        // For Users
        'addUser' => ROOT_URL . DS . RES['app'] . DS . RES['users'] . DS . RES['add'],
        'viewUser' => ROOT_URL . DS . RES['app']. DS . RES['users'] . DS . RES['view'],
        'editUser' => ROOT_URL . DS . RES['app'] . DS . RES['users'] . DS . RES['edit'],
        'deleteUser' => ROOT_URL . DS . RES['app'] . DS . RES['users'] . DS . RES['delete'],

        // For User Types
        'addUserType' => ROOT_URL . DS . RES['app'] . DS . RES['usertypes'] . DS . RES['add'],
        'viewUserType' => ROOT_URL . DS . RES['app']. DS . RES['usertypes'] . DS . RES['view'],
        'editUserType' => ROOT_URL . DS . RES['app'] . DS . RES['usertypes'] . DS . RES['edit'],
        'deleteUserType' => ROOT_URL . DS . RES['app'] . DS . RES['usertypes'] . DS . RES['delete'],

        // For Members
        'addMember' => ROOT_URL . DS . RES['app'] . DS . RES['members'] . DS . RES['add'],
        'viewMember' => ROOT_URL . DS . RES['app']. DS . RES['members'] . DS . RES['view'],
        'editMember' => ROOT_URL . DS . RES['app'] . DS . RES['members'] . DS . RES['edit'],
        'deleteMember' => ROOT_URL . DS . RES['app'] . DS . RES['members'] . DS . RES['delete'],


    ];

//    var_dump(ROOT_URL);
//    var_dump(ROUTES);

?>

