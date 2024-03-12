<?php

declare(strict_types=1);

namespace Modules\Services;

use App\Config\Fields;
use App\config\FormFields;
use Modules\Exception;

class SanitizeForm
{
    public static function loadSanitizeForm(array $params)
    {
        return self::sanitize($params);
    }

    private static function sanitize(array $params): array
    {

        $stringTypeLabels = [];
        $emailTypeLabels = [];
        $intTypeLabels = [];
        $floatTypeLabels = [];
        $telTypeLabels = [];
        $dateTypeLabels = [];

        $controller = $params['controller'];
        $data = $params['data'];

        if (array_key_exists($controller, Fields::FIELD)) {

            $fieldParameters = Fields::FIELD[$controller];

//            dd($data);
//            dd($fieldParameters);


            foreach ($fieldParameters as $parameter => $parameterAttributes) {
                if ($parameterAttributes['type'] === 'text' || $parameterAttributes['type'] === 'password'
                    || $parameterAttributes['type'] === 'hidden') {
                    $stringTypeLabels[] = $parameter;
                } elseif ($parameterAttributes['type'] === 'email') {
                    $emailTypeLabels[] = $parameter;
                } elseif ($parameterAttributes['type'] === 'number' || $parameterAttributes['type'] === 'ageNumber'
                    || $parameterAttributes['type'] === 'money' || $parameterAttributes['type'] === 'months'
                    || $parameterAttributes['type'] === 'year') {
                    $intTypeLabels[] = $parameter;
                } elseif ($parameterAttributes['type'] === 'date' || $parameterAttributes['type'] === 'datetime'
                    || $parameterAttributes['type'] === 'time' || $parameterAttributes['type'] === 'month'
                    || $parameterAttributes['type'] === 'week') {
                    $dateTypeLabels[] = $parameter;
                } elseif ($parameterAttributes['type'] === 'tel' || $parameterAttributes['type'] === 'phoneNumber') {
                    $telTypeLabels[] = $parameter;
                }else {
                    return [
                        'error' => 'undefined input type'
                    ];
                }
            }
        }

//        dd($stringTypeLabels);

        $sanitizedData = [];

        foreach ($data as $key => $value) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

            try {
                // Sanitise further with Sanitizer class
                if (in_array($key, $stringTypeLabels)) {
                    $sanitizedData[$key] = Sanitizer::sanitizeString($value);
                } elseif (in_array($key, $emailTypeLabels)) {
                    $sanitizedData[$key] = Sanitizer::sanitizeEmail($value);
                } elseif (in_array($key, $intTypeLabels)) {
                    $sanitizedData[$key] = Sanitizer::sanitizeInteger($value);
                } elseif (in_array($key, $telTypeLabels)) {
                    $sanitizedData[$key] = Sanitizer::sanitizeInteger($value);
                } elseif (in_array($key, $floatTypeLabels)) {
                    $sanitizedData[$key] = Sanitizer::sanitizeFloat($value);
                } elseif (in_array($key, $dateTypeLabels)) {
                    $sanitizedData[$key] = Sanitizer::sanitizeDate($value);
                }
            } catch (Exception $e) {
                // echo the error message
                $sanitizedData["error"] = "Error sanitizing data: " . $e->getMessage();
            }
        }

//        dd($sanitizedData);
        return $sanitizedData;
    }
}
