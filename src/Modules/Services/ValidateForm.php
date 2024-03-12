<?php

declare(strict_types=1);

namespace Modules\Services;

use App\Config\Fields;
use Modules\HelperWebsite;

class ValidateForm
{

    public static function loadValidateForm(array $params)
    {
        $errors = [];
        $controller = $params['controller'];
        $formData = $params['data'];

        if (array_key_exists($controller, Fields::UNIQUEFIELDS)) {
            $columnNames = Fields::UNIQUEFIELDS[$controller];

            $databaseInfo = HelperWebsite::getFetchColumn($controller, $columnNames);

//            dd($databaseInfo);

            if (isset(Fields::FIELD[$controller])) {
                foreach (Fields::FIELD[$controller] as $fieldName => $fieldConfig) {
                    if (isset($formData[$fieldName])) {
                        $fieldErrors = self::validateField($fieldName, $formData[$fieldName], $fieldConfig);
                        $errors = array_merge($errors, $fieldErrors);

                        if (in_array($fieldName, Fields::UNIQUEFIELDS[$controller])) {
                            $databaseErrors = self::validateDatabase(
                                $fieldName,
                                $formData[$fieldName],
                                $fieldConfig,
                                $databaseInfo
                            );

//                            dd($databaseErrors);
                            $errors = array_merge($errors, $databaseErrors);

                        }
                    }
                }
//                dd($errors);


                return $errors;
            }
        }
    }

    public static function validateDatabase($fieldName, $fieldValue, $fieldConfig, $databaseInfo) {
        $errors = [];

//        dd($fieldName);

        $savedInfo = $databaseInfo;

        foreach ($savedInfo as $rows) {
            if ($fieldValue === $rows[$fieldName]) {
                $errors[$fieldName] =  rtrim($fieldConfig['label'], ":") . " already exists!";
            }
        }

        return $errors;
    }

    // Function to validate a field based on its configuration
    public static function validateField($fieldName, $fieldValue, $fieldConfig) {
        $errors = [];

        // Check if the field is required
        if ($fieldConfig['isRequired'] && empty($fieldValue)) {
            $errors[$fieldName] = rtrim($fieldConfig['label'], ":") . ' is required.';
        }

        // Check field type
        switch ($fieldConfig['type']) {
            case 'number':
                // Validate numeric fields
                if (!is_numeric($fieldValue)) {
                    $errors[$fieldName] = rtrim($fieldConfig['label'], ":") . ' must be a number.';
                } elseif (isset($fieldConfig['min']) && $fieldValue < $fieldConfig['min']) {
                    $errors[$fieldName] = rtrim($fieldConfig['label'], ":") . ' must be at least ' . $fieldConfig['min'] . '.';
                } elseif (isset($fieldConfig['max']) && $fieldValue > $fieldConfig['max']) {
                    $errors[$fieldName] = rtrim($fieldConfig['label'], ":") . ' cannot exceed ' . $fieldConfig['max'] . '.';
                }
                break;

            case 'email':
                // Validate email fields
                if (!filter_var($fieldValue, FILTER_VALIDATE_EMAIL)) {
                    $errors[$fieldName] = 'Invalid email format for ' . rtrim($fieldConfig['label'], ":") . '.';
                }
                break;

            case 'password':
                // Validate password fields
                if (strlen($fieldValue) < 8) {
                    $errors[$fieldName] = 'Password must be at least 8 characters for ' . rtrim($fieldConfig['label'], ":") . '.';
                }
                break;

            case 'date':
                // Validate date fields
                if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $fieldValue)) {
                    $errors[$fieldName] = 'Invalid date format for ' . rtrim($fieldConfig['label'], ":") . '. Use YYYY-MM-DD.';
                }
                break;

            case 'text':
                // Validate text fields
                if (strlen($fieldValue) < 3) {
                    $errors[$fieldName] = rtrim($fieldConfig['label'], ":") . ' must be at least 3 characters.';
                }
                break;

            case 'textarea':
                // Validate textarea fields
                if (strlen($fieldValue) < 10) {
                    $errors[$fieldName] = rtrim($fieldConfig['label'], ":") . ' must be at least 10 characters.';
                }
                break;

            case 'checkbox':
                // Validate checkbox fields
                if ($fieldValue !== '1') {
                    $errors[$fieldName] = 'You must agree to ' . rtrim($fieldConfig['label'], ":") . '.';
                }
                break;

            case 'url':
                // Validate URL fields
                if (!filter_var($fieldValue, FILTER_VALIDATE_URL)) {
                    $errors[$fieldName] = 'Invalid URL format for ' . rtrim($fieldConfig['label'], ":") . '.';
                }
                break;


            default:
                // Default case for text fields
                // You might want to add additional validation for other field types
                break;
        }

        return $errors;
    }
}
