<?php

declare(strict_types=1);

namespace Modules\Services;

class Sanitizer
{
    // Sanitize input string
    public static function sanitizeString($input): string
    {
        $sanitized = trim($input);             // Remove leading/trailing space
        $sanitized = stripslashes($sanitized); // Remove backslashes
        $sanitized = strip_tags($sanitized); // Remove HTML tags and scripts
        // Use html entities to convert special characters to HTML entities
        return htmlentities($sanitized, ENT_QUOTES, 'UTF-8');
    }

    // Sanitize input Description
    public static function sanitizeDescription($input): string
    {
        $sanitized = trim($input);             // Remove leading/trailing space
        $sanitized = stripslashes($sanitized); // Remove backslashes

        // Allow specific HTML tags (<b>, <i>, <strong>, <small>, )
        $sanitized = strip_tags($sanitized, '<b><i><strong><small><p>');

        // Use html entities to convert special characters to HTML entities
        return htmlentities($sanitized, ENT_QUOTES, 'UTF-8');
    }


    // Sanitize input date
    public static function sanitizeDate($input): string
    {
        return date('Y-m-d H:i:s', strtotime(self::sanitizeString($input))) ?? '';
    }

    // Sanitize input integer
    public static function sanitizeInteger($input)
    {
        return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
    }

    // Sanitize input float
    public static function sanitizeFloat($input)
    {
        return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }

    // Sanitize input email address
    public static function sanitizeEmail($input)
    {
        return filter_var($input, FILTER_SANITIZE_EMAIL);
    }

    // Sanitize input token
    public static function sanitizeToken($input): array|string|null
    {
        return preg_replace('/[^a-zA-Z0-9]/', '', $input);
    }

    // Convert the input to a boolean
    public static function sanitizeBoolean($input): bool
    {
        return $input === true || $input === 1 || $input === '1' || strtolower($input) === 'true';
    }

}



