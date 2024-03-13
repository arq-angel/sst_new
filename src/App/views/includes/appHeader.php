<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?php
        echo e($title); ?></title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
</head>

<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-body">
        <div class="container-fluid py-2 rounded bg-body-tertiary">
            <a class="navbar-brand" href="<?= e($rootUrl) . '/app' ?>"
            >
                <div class="display-lead">SST</div>
            </a
            >
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fa-solid fa-house"></i> Dashboard
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Link #1</a></li>
                            <li><a class="dropdown-item" href="#">Link #2</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fa-solid fa-ticket-simple"></i> Applications
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= e($rootUrl) . '/app/application' ?>">Review
                                    applications</a></li>
                            <li><a class="dropdown-item" href="<?= e($rootUrl) . '/app/application/add' ?>">Add
                                    application</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fa-solid fa-graduation-cap"></i> Students
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= e($rootUrl) . '/app/student' ?>">View Students</a></li>
                            <li><a class="dropdown-item" href="<?= e($rootUrl) . '/app/student/add' ?>">Add Students</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <div class="rounded-pill bg-body-secondary px-3 py-0 mx-1">
                        <a href="" class="nav-item nav-link"
                        ><i class="fa-solid fa-bell"></i></i
                            ></a>
                    </div>
                    <div class="rounded-pill bg-body-secondary px-3 py-0 mx-1">
                        <a href="" class="nav-item nav-link"
                        ><i class="fa-solid fa-comment fa-lg"></i
                            ></a>
                    </div>
                    <div class="rounded-pill bg-body-secondary px-3 py-0 mx-1 position-relative">
                        <a class="nav-item nav-link dropdown-toggle" href="#" role="button" id="profileDropdown"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user fa-lg"></i> Profile Name
                        </a>
                        <ul class="dropdown-menu dropdown-menu-center" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user-pen"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-envelope"></i> Messages</a></li>
                            <li><a class="dropdown-item" href="<?= e($rootUrl) . '/auth/logout' ?>"><i
                                        class='fa-solid fa-right-from-bracket'></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Sidebar -->
        <nav class="col-md-2 d-md-block bg-body sidebar rounded">
            <div class="sidebar-sticky">
                <!-- Sidebar content goes here -->
                <ul
                    class="nav flex-column bg-body-tertiary py-2 px-2 min-vh-100 rounded"
                >
                    <li class="nav-item mb-2">
                        <div class="rounded bg-body-secondary px-3 py-0 mx-1">
                            <a
                                class="nav-link text-dark px-0 px-3"
                                href=""
                                data-bs-toggle="collapse"
                                data-bs-target="#colleges"
                                aria-expanded="false"
                                aria-controls="colleges"
                            >
                                <i class="fa-solid fa-building-columns"></i> Colleges
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="colleges">
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/college' ?>"
                                    ><i class="fa-solid fa-magnifying-glass"></i> View
                                        Colleges</a
                                    >
                                </li>
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/college/add' ?>"
                                    ><i class="fa-solid fa-plus"></i> Add College</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mb-2">
                        <div class="rounded bg-body-secondary px-3 py-0 mx-1">
                            <a
                                class="nav-link text-dark px-0 px-3"
                                href=""
                                data-bs-toggle="collapse"
                                data-bs-target="#branches"
                                aria-expanded="false"
                                aria-controls="branches"
                            >
                                <i class="fa-solid fa-building-columns"></i> Branches
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="branches">
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/branch' ?>"
                                    ><i class="fa-solid fa-magnifying-glass"></i> View
                                        Branches</a
                                    >
                                </li>
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/branch/add' ?>"
                                    ><i class="fa-solid fa-plus"></i> Add Branch</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mb-2">
                        <div class="rounded bg-body-secondary px-3 py-0 mx-1">
                            <a
                                class="nav-link text-dark px-0 px-3"
                                href=""
                                data-bs-toggle="collapse"
                                data-bs-target="#faculties"
                                aria-expanded="false"
                                aria-controls="faculties"
                            >
                                <i class="fa-solid fa-building-columns"></i> Faculties
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="faculties">
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/faculty' ?>"
                                    ><i class="fa-solid fa-magnifying-glass"></i> View
                                        Faculties</a
                                    >
                                </li>
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3"
                                       href="<?= e($rootUrl) . '/app/faculty/add' ?>"
                                    ><i class="fa-solid fa-plus"></i> Add faculty</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mb-2">
                        <div class="rounded bg-body-secondary px-3 py-0 mx-1">
                            <a
                                class="nav-link text-dark px-0 px-3"
                                href=""
                                data-bs-toggle="collapse"
                                data-bs-target="#durations"
                                aria-expanded="false"
                                aria-controls="durations"
                            >
                                <i class="fa-solid fa-building-columns"></i> Durations
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="durations">
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/duration' ?>"
                                    ><i class="fa-solid fa-magnifying-glass"></i> View
                                        Durations</a
                                    >
                                </li>
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3"
                                       href="<?= e($rootUrl) . '/app/duration/add' ?>"
                                    ><i class="fa-solid fa-plus"></i> Add Duration</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mb-2">
                        <div class="rounded bg-body-secondary px-3 py-0 mx-1">
                            <a
                                class="nav-link text-dark px-0 px-3"
                                href=""
                                data-bs-toggle="collapse"
                                data-bs-target="#courses"
                                aria-expanded="false"
                                aria-controls="courses"
                            >
                                <i class="fa-solid fa-building-columns"></i> Courses
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="courses">
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/course' ?>"
                                    ><i class="fa-solid fa-magnifying-glass"></i> View
                                        Courses</a
                                    >
                                </li>
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/course/add' ?>"
                                    ><i class="fa-solid fa-plus"></i> Add Course</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mb-2">
                        <div class="rounded bg-body-secondary px-3 py-0 mx-1">
                            <a
                                class="nav-link text-dark px-0 px-3"
                                href=""
                                data-bs-toggle="collapse"
                                data-bs-target="#sessions"
                                aria-expanded="false"
                                aria-controls="sessions"
                            >
                                <i class="fa-solid fa-building-columns"></i> Sessions
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="sessions">
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/session' ?>"
                                    ><i class="fa-solid fa-magnifying-glass"></i> View
                                        Sessions</a
                                    >
                                </li>
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/session/add' ?>"
                                    ><i class="fa-solid fa-plus"></i> Add Session</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mb-2">
                        <div class="rounded bg-body-secondary px-3 py-0 mx-1">
                            <a
                                class="nav-link text-dark px-0 px-3"
                                href=""
                                data-bs-toggle="collapse"
                                data-bs-target="#units"
                                aria-expanded="false"
                                aria-controls="units"
                            >
                                <i class="fa-solid fa-building-columns"></i> Units
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="units">
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/unit' ?>"
                                    ><i class="fa-solid fa-magnifying-glass"></i> View
                                        Units</a
                                    >
                                </li>
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/unit/add' ?>"
                                    ><i class="fa-solid fa-plus"></i> Add Unit</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mb-2">
                        <div class="rounded bg-body-secondary px-3 py-0 mx-1">
                            <a
                                class="nav-link text-dark px-0 px-3"
                                href=""
                                data-bs-toggle="collapse"
                                data-bs-target="#terms"
                                aria-expanded="false"
                                aria-controls="terms"
                            >
                                <i class="fa-solid fa-building-columns"></i> Terms
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="terms">
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/term' ?>"
                                    ><i class="fa-solid fa-magnifying-glass"></i> View
                                        Terms</a
                                    >
                                </li>
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/term/add' ?>"
                                    ><i class="fa-solid fa-plus"></i> Add Term</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mb-2">
                        <div class="rounded bg-body-secondary px-3 py-0 mx-1">
                            <a
                                class="nav-link text-dark px-0 px-3"
                                href=""
                                data-bs-toggle="collapse"
                                data-bs-target="#scholarships"
                                aria-expanded="false"
                                aria-controls="scholarships"
                            >
                                <i class="fa-solid fa-building-columns"></i> Scholarships
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="scholarships">
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3" href="<?= e($rootUrl) . '/app/scholarship' ?>"
                                    ><i class="fa-solid fa-magnifying-glass"></i> View
                                        Scholarships</a
                                    >
                                </li>
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3"
                                       href="<?= e($rootUrl) . '/app/scholarship/add' ?>"
                                    ><i class="fa-solid fa-plus"></i> Add Scholarship</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mb-2">
                        <div class="rounded bg-body-secondary px-3 py-0 mx-1">
                            <a
                                class="nav-link text-dark px-0 px-3"
                                href=""
                                data-bs-toggle="collapse"
                                data-bs-target="#notifications"
                                aria-expanded="false"
                                aria-controls="notifications"
                            >
                                <i class="fa-solid fa-building-columns"></i> Notifications
                                <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="notifications">
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3"
                                       href="<?= e($rootUrl) . '/app/notification' ?>"
                                    ><i class="fa-solid fa-magnifying-glass"></i> View
                                        Notifications</a
                                    >
                                </li>
                                <li>
                                    <a class="nav-link text-dark ps-3 pe-3"
                                       href="<?= e($rootUrl) . '/app/notification/add' ?>"
                                    ><i class="fa-solid fa-plus"></i> Add Notification</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Add more sidebar links as needed -->


                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main
            role="main"
            class="rounded col-md-9 ml-sm-auto col-lg-10 px-2 py-3 bg-body-tertiary text-light"
        >
            <!-- Main content goes here -->
            <div class="container text-dark">
                <div class="container rounded bg-body py-3">
