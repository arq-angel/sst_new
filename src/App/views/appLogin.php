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

<div class="container-fluid mx-0">

    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column login-left-box"
                 style="background: #103cbe">
                <div class="featured-image mb-3">
                    <img src="../assets/images/1.png" class="img-fluid" style="width: 250px;" alt="featured image">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600">
                    Join Now</p>
                <small class="text-white text-wrap text-center" style="width: 17rem; font-family: 'Courier New', Courier, monospace;">Apply on the best courses on this platform.</small>
            </div>

            <div class="col-md-6 login-right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Hello, Again</h2>
                        <p>We are happy to have you back.</p>
                    </div>

                    <?php

                     $errorMessage = $message['errorMessage'] ?? '';
                     echo $errorMessage ? "<p class='text-danger'>$errorMessage</p>" : "";

                    ?>

                    <form action="" method="post">
                        <?php require_once "includes/csrf.php";?>
                        <div class="input-group mb-3">
                            <input type="text" name="userEmail" id="userEmail" class="form-control form-control-lg bg-light fs-6" placeholder="Email Address">
                        </div>
                        <div class="input-group mb-1">
                            <input type="password" name="userPassword" id="userPassword" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                        </div>
                        <div class="input-group mt-2 mb-5 d-flex">
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
></script>
</body>
</html>


