<?php

declare(strict_types=1);

namespace Modules\Services;

use App\Config\Site;
use Modules\Website;
use Modules\HelperWebsite;

class AuthService
{

    public static function loginService(): void
    {
        $data = $_POST;

//            dd($data);

        $validationResult = Website::getValidate($data);

        if ($validationResult['success']) {
            $validatedData = $validationResult['data'];

            $sanitizationResult = Website::getSanitize($validatedData);

//                dd($sanitizationResult);

            if (!isset($sanitizationResult['error'])) {
                $userEmail = $sanitizationResult['userEmail'];
                $userPassword = $sanitizationResult['userPassword'];

                $result = Website::getVerifyCredentials($userEmail, $userPassword);

                if ($result) {
                    if (Website::getIsAuthenticated()) {

                        header('Location:' . Site::ROOT_URL . '/app');
                        exit();
                    }
                } else {
                    echo "Incorrect username and password!";
                }
            } else {
                echo $sanitizationResult['error'];
            }
        } else {
            foreach ($validationResult['message'] as $messages) {
                echo $messages . '<br>';
            }
        }

    }

    public static function registerService(): bool
    {

        $data = $_POST;

        $validationResult = Website::getValidate($data);

        if($validationResult['success']) {

            $validatedData = $validationResult['data'];

            $sanitizationResult = Website::getSanitize($validatedData);

            if (!isset($sanitizationResult['error'])) {

                $userFirstName = $sanitizationResult['userFirstName'];
                $userLastName = $sanitizationResult['userLastName'];
                $userEmail = $sanitizationResult['userEmail'];
                $userPassword = $sanitizationResult['userPassword'];
                $userAge = $sanitizationResult['userAge'];
                $userPhone = $sanitizationResult['userPhone'];
                $userAddress = $sanitizationResult['userAddress'];
                $userCountry = $sanitizationResult['userCountry'];
                // 0 means not admin
                $isAdmin = 0;

                $parameter = [
                    'userFirstName' => $userFirstName,
                    'userLastName' => $userLastName,
                    'userEmail' => $userEmail,
                    'userPassword' => $userPassword,
                    'userAge' => $userAge,
                    'userPhone' => $userPhone,
                    'userAddress' => $userAddress,
                    'userCountry' => $userCountry,
                    'isAdmin' => $isAdmin,
                ];

                return HelperWebsite::getCreateUser($parameter);

            } else {
                echo $sanitizationResult['error'];
            }

        } else {
            foreach ($validationResult['message'] as $messages) {
                echo $messages . '<br>';
            }
        }


    }

    public static function logoutService()
    {
        if (Website::getLogout()) {
            return true;
        }

        return false;
    }

}
