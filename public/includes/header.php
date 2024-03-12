
<?php

use App\Controllers\PublicViewController;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= e($title)?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>

        body{
            background: #ececec;
        }

        .box-area{
            width: 930px;
        }

        .login-right-box{
            padding: 40px 30px 40px 40px;
        }

        ::placeholder{
            font-size: 16px;
        }

        @media only screen and (max-width: 768px){

            .box-area{
                margin 0 10px;
            }

            .login-left-box{
                height: 100px;
                overflow: hidden;
            }

            .login-right-box{
                padding: 20px;
            }

        }

    </style>
</head>
<body>

<div class="container-fluid mx-0  min-vh-100">
    <div class="row">
        <nav class="navbar navbar-expand-lg" style="background: #103cbe">
            <div class="container-fluid">
                <div class="navbar-nav">
                    <a class="nav-link text-white" href="<?= $rootUrl . '/home'?>"><i class="fa-solid fa-house"></i> Home</a>
<!--                    <a class="nav-link text-white" href="--><?php //= $rootUrl . '/contact'?><!--"><i class="fa-regular fa-address-card"></i> Contact</a>-->
<!--                    <a class="nav-link text-white" href="--><?php //= $rootUrl . '/about'?><!--"><i class="fa-solid fa-circle-info"></i> About us</a>-->

                    <ul class="navbar-nav ms-auto">
                        <?php

                        if(PublicViewController::isLoggedIn()) {

                            $logoutURL = $rootUrl . '/auth/logout';
                            $a_homeURL = $rootUrl . '/app/home';

                            echo "<a class='nav-link text-white' href='". $a_homeURL ."'> <i class='fa-solid fa-user-tie'></i> App</a>";

                            echo "<a class='nav-link text-white' href='". $logoutURL ."'><i class='fa-solid fa-right-from-bracket'></i> log out</a>";
                            echo "<a class='nav-link text-white'><i class='fa-solid fa-user'></i> Logged In</a>";
                        } else {

                            $loginURL = $rootUrl . '/auth/login';

                            echo "<a class='nav-link text-white' href='". $loginURL ."'><i class='fa-solid fa-right-to-bracket'></i> log In</a>";
                        }

                        ?>
                    </ul>

                </div>
            </div>
        </nav>
    </div>
    <div class="row">

        <main class="">
            <!-- Your page content goes here -->




