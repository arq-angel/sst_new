<?php

declare(strict_types=1);

namespace APP\API;

use Modules\HelperWebsite;

class APIController
{


    public static function apiProcess()
    {

//        self::fetchCourses('course');

        // Allow requests from specific origin
        header('Access-Control-Allow-Origin: http://sstone.cc');

        // Allowable HTTP methods
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

        // Allowable headers (including custom headers like Authorization)
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

        // Handle preflight requests for CORS
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            // Exit early for OPTIONS requests, after sending CORS headers
            exit();
        }

        $headers = getallheaders();
        $authorizationHeader = $headers['Authorization'] ?? null;

        if (is_null($authorizationHeader)) {
            http_response_code(401); // Unauthorized
            echo self::parseToJson([
                'error' => "No authorization token provided",
            ]);
            exit;
        }

        if (preg_match('/Bearer\s(\S+)/', $authorizationHeader, $matches)) {
            $token = $matches[1];
            // Proceed with token validation and fetching courses if token is valid.
        } else {
            http_response_code(400); // Bad Request
            echo self::parseToJson([
                'error' => "Malformed authorization token",
            ]);
            exit;
        }

        if (self::validateApiRequest(['token' => $token])) {
            $data = self::fetchCourses('course'); // Assuming 'course' is a valid request type.
            echo self::parseToJson($data);
        } else {
            http_response_code(403); // Forbidden
            echo self::parseToJson([
                'error' => 'Invalid token! Cannot process request',
            ]);
            exit;
        }
    }

    public static function fetchCourses($request): array
    {
        $tableName = $request;

        $result = HelperWebsite::getViewRecord($tableName);

//        dd($result);

        if (is_array($result) && !empty($result)) {
            $modifiedResult = [];
            foreach ($result as $rows) {
                $modifiedCourse = [];

                $modifiedCourse['imgSrc'] = '';
                $modifiedCourse['title'] = $rows['courseName'];
                $modifiedCourse['price'] = $rows['courseFees'];

                if ($rows['courseDepartmentId'] !== 0) {
                    $dataFromDB = HelperWebsite::getFetchColumnWithClause(
                        'department',
                        'departmentName',
                        [
                            'departmentId' => $rows['courseDepartmentId']
                        ],
                    );

                    // Check if $dataFromDB has any results before accessing the first element
                    if (!empty($dataFromDB)) {
                        $modifiedCourse['category'] = $dataFromDB[0]['departmentName'];
                    }
                }

                $modifiedCourse['description'] = $rows['courseDescription'];

                // Append the modified course to the result array
                $modifiedResult[] = $modifiedCourse;
            }

            return $modifiedResult;
        } else {
            return [
                'error' => 'Could not fetch courses.'
            ];
        }
    }

    public static function parseToJson($data): string
    {
        return json_encode($data);
    }

    public static function validateApiRequest(array $params): bool
    {
        $requestToken = $params['token'];
        $verifiedToken = self::getApiToken();

        if ($requestToken === $verifiedToken) {
            return true;
        }

        return false;
    }

    public static function getApiToken(): string
    {
        $apiKey = 'cdccdab4af3ce30e9900b6bdf29183e4fc5502ff87c9738fe395c228db4c1db6';
        $salt = 'http://sst.cc';

        $saltedApiKey = $salt . $apiKey;

        $apiToken = hash('sha256', $saltedApiKey);

        return $apiToken;

    }

}