<?php


declare(strict_types=1);

namespace Modules\CRUD;

use App\Config\Fields;
use Modules\HelperWebsite;
use Modules\Services\Notification;
use Modules\Services\SanitizeForm;

class CreateRecord
{
    public static function loadCreateRecord(string $controller, array $data): array|bool
    {
        if ($controller === 'student' || $controller === 'users') {
            $data = self::addRandomId($controller, $data);
        }
        $sanitizationResult = SanitizeForm::loadSanitizeForm([
            'controller' => $controller,
            'data' => $data
        ]);

        if (!isset($sanitizationResult['error'])) {
            $parameters = [];

            foreach (Fields::FIELD[$controller] as $key => $value) {
                $fieldName = $key;
                $valueName = $sanitizationResult[$key];

                // reassigning the validated and sanitized data to the appropriate fieldName and
                // into an array called $parameters
                // to pass to the getCreateRecord() method
                $parameters[$fieldName] = $valueName;
            }

//            dd($parameters);

            $result = HelperWebsite::getCreateRecord($parameters, $controller);

            return $result;

        } else {
            Notification::add($sanitizationResult['error'], 'warning');
        }

        return [];
    }

    public static function generateRandomId($initials): string
    {
        $randomNumber = strval(random_int(0, 1_000_000));
        $formattedNumber = $initials . str_pad($randomNumber, 7, '0', STR_PAD_LEFT);

        return $formattedNumber;
    }

    public static function addRandomId(string $controller, array $data): array
    {
        if ($controller === 'student') {
            // generate random id and check in the database for duplicate
            $studentInitials = 'I0';

            do {
                // Generate a new random ID
                $randomId = self::generateRandomId($studentInitials);

                // Check if the ID already exists in the database
                $idFieldName = 'studentId';
                $idValues = $randomId;
                $queryResult = HelperWebsite::getFetchColumnWithClause($controller, $idFieldName, [$idFieldName => $idValues]);
                // If the ID already exists, continue the loop and generate a new one
            } while (count($queryResult) !== 0);

            $data['studentId'] = $randomId;

            return $data;
        } elseif ($controller === 'user') {
            // generate random id and check in the database for duplicate
            $userInitials = 'I1';

            do {
                // Generate a new random ID
                $randomId = self::generateRandomId($userInitials);

                // Check if the ID already exists in the database
                $idFieldName = 'userId';
                $idValues = $randomId;
                $queryResult = HelperWebsite::getFetchColumnWithClause($controller, $idFieldName, $idValues);
                // If the ID already exists, continue the loop and generate a new one
            } while (count($queryResult) !== 0);

            $data['userId'] = $randomId;

            return $data;
        }

        return $data;
    }
}
