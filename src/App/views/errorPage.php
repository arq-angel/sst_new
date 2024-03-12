<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h1>Oops! Something went wrong.</h1>
<p><?php

    $message = $errorMessage ?? '';

    echo $message ? "<p class='text-danger'>$message</p>" : "";

    ?></p>
<p>Return to the <a href="/">home page</a>.</p>
</body>
</html>

