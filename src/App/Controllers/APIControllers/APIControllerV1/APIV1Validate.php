<?php

declare(strict_types=1);

namespace App\Controllers\APIControllers\APIControllerV1;

class APIV1Validate
{
    public static function loadAPIV1Validate($token)
    {

        if ($token === self::generateToken()) {
            return true;
        }

        return false;

    }

    public static function generateToken($salt = ''): string
    {
        $salt = 'sst3.cc';
        $key = '1bf4049106ab3359eb5753143a5cffb0e6914f1371d261bb4e067bf87df7b87a';

        $saltedKey = $salt . $key;

        $generatedToken = hash('sha256', $saltedKey);

        return $generatedToken;

    }
}
