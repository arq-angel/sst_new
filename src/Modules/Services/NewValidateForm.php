<?php

declare(strict_types=1);

namespace Modules\Services\NewValidateForm;

class Validator {
    private static $errors = [];

    public static function validate($data, $rules) {
        foreach ($rules as $field => $rule) {
            $rules = explode('|', $rule);

            foreach ($rules as $singleRule) {
                self::applyRule($field, $singleRule, $data);
            }
        }

        return empty(self::$errors);
    }

    private static function applyRule($field, $rule, $data) {
        $params = explode(':', $rule);

        switch ($params[0]) {
            case 'required':
                self::validateRequired($field, $data);
                break;

            case 'min':
                self::validateMin($field, $params[1], $data);
                break;

            // Add more cases for other rules as needed

            default:
                break;
        }
    }

    private static function validateRequired($field, $data) {
        if (empty($data[$field])) {
            self::$errors[$field][] = 'The ' . $field . ' field is required.';
        }
    }

    private static function validateMin($field, $min, $data) {
        if (strlen($data[$field]) < $min) {
            self::$errors[$field][] = 'The ' . $field . ' must be at least ' . $min . ' characters.';
        }
    }

    // Add more validation methods as needed

    public static function getErrors() {
        return self::$errors;
    }
}
