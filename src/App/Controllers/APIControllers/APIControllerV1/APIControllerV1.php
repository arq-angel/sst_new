<?php

declare(strict_types=1);

namespace App\Controllers\APIControllers\APIControllerV1;

class APIControllerV1
{

    public static function processV1($request = '') {

//        APIV1Get::fetchCourses('course');
//        dd($_GET);

        // Handle preflight requests for CORS
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            header('Access-Control-Allow-Origin: http://127.0.0.1:5500/'); // Adjust the allowed origin as needed
            header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
            header('Access-Control-Allow-Headers: Authorization, Content-Type');
            header('Access-Control-Max-Age: 86400'); // 24 hours
            exit(0); // Stop script execution after sending preflight response
        }

        // Include CORS headers in all responses
        header('Access-Control-Allow-Origin: http://127.0.0.1:5500/'); // Adjust the allowed origin as needed


        $authorizationHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
        preg_match('/Bearer\s(\S+)/', $authorizationHeader, $matches);
        $token = $matches[1] ?? null;

        if ($token === null || !APIV1Validate::loadAPIV1Validate($token)) {
            header('HTTP/1.1 401 Unauthorized');
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Unauthorized: Token is invalid or missing']);
            exit; // Stop further execution if the token is not valid
        }

        // Determine the HTTP method
        $method = $_SERVER['REQUEST_METHOD'];

        // Get the request data based on the method
        $requestData = null;
        if ($method == 'POST' || $method == 'PUT') {
            // Assuming JSON payload for simplicity, adjust as needed
            $requestData = json_decode(file_get_contents('php://input'), true);
        }

        // Example of determining the action based on the request and method
        switch ($method) {
            case 'GET':
                // Handle GET requests
                APIV1Get::getHandleGet();
                break;
            case 'POST':
                // Handle POST requests
                APIV1Post::getHandlePost($requestData);
                break;
            case 'PUT':
                // Handle PUT requests
                APIV1Put::getHandlePut($requestData);
                break;
            case 'DELETE':
                // Handle DELETE requests
                APIV1Delete::getHandleDelete();
                break;
            default:
                // Respond with an error for unsupported methods
                header('HTTP/1.1 405 Method Not Allowed');
                header('Content-Type: application/json');
                echo json_encode(['error' => 'Method Not Allowed']);
                break;
        }

    }

}
