<?php

declare(strict_types=1);

namespace APP\API;

class APIAuthenticator
{
    public static function validateApiRequest(array $params): bool
    {
        $requestToken = $params['token'];
        $verifiedToken = self::getApiToken();

        return $requestToken === $verifiedToken;
    }

    public static function getApiToken(): string
    {
        $apiKey = 'cdccdab4af3ce30e9900b6bdf29183e4fc5502ff87c9738fe395c228db4c1db6';
        $salt = 'sst.cc';

        $saltedApiKey = $salt . $apiKey;

        $apiToken = hash('sha256', $saltedApiKey);

        return $apiToken;
    }
}
