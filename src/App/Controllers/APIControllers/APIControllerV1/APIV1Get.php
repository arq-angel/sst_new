<?php

declare(strict_types=1);

namespace App\Controllers\APIControllers\APIControllerV1;

use Modules\HelperWebsite;

class APIV1Get
{
    private static function handleGet()
    {
        $tableName = htmlspecialchars(isset($_GET['name']) ? $_GET['name'] : '');

        if ($tableName === 'course') {

            $response = self::fetchCourses();

            if ($response['success']) {
                header('Content-Type: application/json');
                echo json_encode($response['data']);
            } else {
                header('Content-Type: application/json');
                http_response_code(404); // Or 500, depending on the error
                echo json_encode(['message' => $response['message']]);
            }
        } else {
            header('Content-Type: application/json');
            http_response_code(404); // Or 500, depending on the error
            echo json_encode(['message' => 'Table not found']);
        }
        exit;

    }

    public static function getHandleGet()
    {
        self::handleGet();
    }

    public static function fetchCourses(): array
    {
        // Fetch the course records
        $result = HelperWebsite::getViewRecord('course');

        $response = [];

        // Check if $result is not empty and is an array
        if (is_array($result) && !empty($result)) {
            foreach ($result as $courseDetails) {
                // Transform each course detail into the desired format
                $response[] = [
                    'Name' => $courseDetails['courseName'] ?? 'N/A', // Provide a default value in case the key doesn't exist
                    'Fee' => $courseDetails['courseFees'] ?? 'N/A',
                    'Duration' => $courseDetails['durationId'] ?? 'N/A',
                    'DeliveryMode' => $courseDetails['courseDelivery'] ?? 'N/A',
                ];
            }
        } else {
            // Return an error message if no courses are found or if there's an issue with the data
            return [
                'success' => false,
                'message' => 'No courses found or there was an error fetching the courses.'
            ];
        }

        // Return the successful response with the transformed data
        return [
            'success' => true,
            'data' => $response
        ];


    }



}
