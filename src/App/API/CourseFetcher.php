<?php

declare(strict_types=1);

namespace APP\API;

use Modules\HelperWebsite;

class CourseFetcher
{
    public static function fetchCourses($request): array
    {
        $tableName = $request;

        $result = HelperWebsite::getViewRecord($tableName);

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

                    if (!empty($dataFromDB)) {
                        $modifiedCourse['category'] = $dataFromDB[0]['departmentName'];
                    }
                }

                $modifiedCourse['description'] = $rows['courseDescription'];

                $modifiedResult[] = $modifiedCourse;
            }

            return $modifiedResult;
        } else {
            return [
                'error' => 'Could not fetch courses.'
            ];
        }
    }
}
