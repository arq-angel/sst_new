<?php

declare(strict_types=1);

namespace Modules\Services;

class CsrfProtection
{
    private static $tokenKey = 'csrf_token';

    // Generate and set CSRF token in the session
    public static function generateToken()
    {
        if (empty($_SESSION[self::$tokenKey])) {
            $_SESSION[self::$tokenKey] = bin2hex(random_bytes(32));
        }

//        echo "CsrfProtection";
//        var_dump($_SESSION);
    }

    // Get the generated CSRF token
    public static function getToken()
    {
        return $_SESSION[self::$tokenKey];
    }

    // Validate CSRF token
    public static function validateToken($submittedToken)
    {
        if (isset($_SESSION[self::$tokenKey]) && hash_equals($_SESSION[self::$tokenKey], $submittedToken)) {
            // Valid CSRF token
            self::destroyToken();
            return true;
        }

        // Invalid CSRF token
        return false;
    }

    public static function validateSiteToken($submittedToken)
    {
        if (isset($_SESSION[self::$tokenKey]) && hash_equals($_SESSION[self::$tokenKey], $submittedToken)) {
            // Valid CSRF token
            return true;
        }

        // Invalid CSRF token
        return false;
    }

    // Destroy CSRF token in the session
    private static function destroyToken()
    {
        $_SESSION[self::$tokenKey] = null;
    }

    public static function getDestroyToken()
    {
        self::destroyToken();
    }
}
