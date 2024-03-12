<?php

declare(strict_types=1);

namespace Modules;

use Modules\Services\Sanitizer;
use Modules\Services\CsrfProtection;

class Website
{

    // AuthService section
    private static function verifyCredentials(string $email, string $password): bool
    {
        $query = "SELECT * FROM sstuser WHERE userEmail = :email AND userPassword = :password AND isAdmin = 1";

        $args = [
            ':email' => $email,
            ':password' => $password,
        ];

        $queryResult = HelperDatabase::executeQuery($query, $args, 'read');

        if (count($queryResult['result']) > 0) {
            self::getAuthenticate($email);

            return true;
        }

        return false;

    }

    private static function authenticate(string $email): void
    {
        // Set a sessions variable to mark the user as authenticated
        $_SESSION['authenticated_user'] = $email;
        CsrfProtection::generateToken();

//        $_SESSION['token'] = CsrfProtection::getToken();
//        dd($_SESSION);
    }

    private static function verifyToken($token): bool
    {

        if (CsrfProtection::validateSiteToken($token)) {
            return true;
        }

        return false;
    }


    private static function isAuthenticated(): bool
    {
        // Check if the user is authenticated
        return (isset($_SESSION['authenticated_user']) && (self::getVerifyToken($_SESSION['csrf_token'])));

        // remove for actual implementation and uncomment above expression - just for demo
//        return true;
    }

    private static function hasPermission(): bool
    {
        return true;
    }

    private static function logout(): bool
    {
        // Log out the user by destroying the sessions
        session_destroy();

        return true;
    }
    // End-of-authentication section

    // Data sanitisation and validation section
    private static function sanitize(array $data): array
    {
        $sanitizedData = [];

        foreach ($data as $key => $value) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

            try {
                // Sanitise further with Sanitizer class
                if (in_array($key, ["userPassword","userFirstName", "userLastName", "userPhone", "userAddress", "userCountry"])) {
                    $sanitizedData[$key] = Sanitizer::sanitizeString($value);
                } elseif (in_array($key, ["userEmail"])) {
                    $sanitizedData[$key] = Sanitizer::sanitizeEmail($value);
                } elseif (in_array($key, ["userAge"])) {
                    $sanitizedData[$key] = Sanitizer::sanitizeInteger($value);
                } elseif (in_array($key, [])) {
                    $sanitizedData[$key] = Sanitizer::sanitizeFloat($value);
                } elseif (in_array($key, [])) {
                    $sanitizedData[$key] = Sanitizer::sanitizeDescription($value);
                } elseif (in_array($key, [])) {
                    $sanitizedData[$key] = Sanitizer::sanitizeDate($value);
                }
            } catch (Exception $e) {
                // echo the error message
                $sanitizedData["error"] = "Error sanitizing data: " . $e->getMessage();
            }
        }
        return $sanitizedData;
    }

    private static function validate(array $data): array
    {
        $errorMessages = [];

        foreach ($data as $key => $value) {
            if (empty($value)) {
                $errorMessages[] = "Please enter the " . ucfirst($key) . "!";
            }
        }

        if (empty($errorMessages)) {
            return [
                'success' => true,
                'message' => "All fields are filled <br>",
                'data' => $data
            ];
        } else {
            return [
                'success' => false,
                'message' => $errorMessages,
                'data' => $data
            ];
        }
    }

    // End-of-data-sanitisation-and-validation section


    public static function getVerifyCredentials(string $userEmail, string $userPassword): bool
    {
        return self::verifyCredentials($userEmail, $userPassword);
    }

    public static function getAuthenticate(string $email): void
    {
        self::authenticate($email);
    }

    public static function getVerifyToken(string $token): bool
    {
        return self::verifyToken($token);
    }

    public static function getIsAuthenticated(): bool
    {
        return self::isAuthenticated();
    }

    public static function getHasPermission(): bool
    {
        return self::hasPermission();
    }

    public static function getLogout(): bool
    {
        return self::logout();
    }

    public static function getSanitize(array $data): array
    {
        return self::sanitize($data);
    }

    public static function getValidate(array $data): array
    {
        return self::validate($data);
    }


}
