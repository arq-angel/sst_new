<?php


declare(strict_types=1);

namespace Modules;

use App\Config\DBConstants;

class HelperWebsite
{

    // CRUD process is done in the following methods needs dbConcstants to work and functions for dd();

    private static function createRecord(array $parameters, string $controller): bool
    {
//        dd($parameters);
//        dd($controller);
        // initialize the $tableName to use in the $query statement
        $tableName = '';

        // from the array of DBTABLELIST identify the $tableName by comparing the corresponding controller
        foreach (DBConstants::DBTABLELIST as $key => $value) {
            if ($value === $controller) {
                $tableName = $key;
            }
        }

        // initialize the $queryFieldNames
        $queryFieldNames = [];

        // get all the fieldnames from DBFIELDLIST and assign to $queryFieldNames
        foreach (DBConstants::DBFIELDLIST[$controller] as $key => $value) {
            $queryFieldNames[] = $key;
        }
//        dd($queryFieldNames);

        // uses the implode function to concatenate the elements of the $queryFieldNames array into a string
        // separated by commas
        $columnsString = implode(', ', $queryFieldNames);

        // anonymous function in array_map takes each element of $queryFieldNames and adds a colon : before it,
        // creating a placeholder
        $placeholders = array_map(function ($columnName) {
            return ':' . $columnName;
        }, $queryFieldNames);

        // uses the implode function to concatenate the elements of the $placeholders array into a string
        // separated by commas
        $placeholdersString = implode(', ', $placeholders);

        //code is creating an associative array ($argsArray) where keys are formed by prefixing each field name
        // from $queryFieldNames with a colon (:), and the corresponding values are taken from the $parameters array
        $argsArray = [];
        foreach ($queryFieldNames as $fieldName) {
            $argsArray[":$fieldName"] = $parameters[$fieldName] ?? null;
        }

//        dd($columnsString);
//        dd($placeholdersString);
        // code is constructing an SQL query for an INSERT operation using the previously generated strings
        // $tableName, $columnsString and $placeholdersString
        $query = "INSERT INTO $tableName ($columnsString)";
        $query .= " VALUES ($placeholdersString)";

        // contains the key-value pairs for the values to be inserted
        $args = $argsArray;

        dd($args);

        // check the $query before database insertion stops further execution of code as well
//        dd($query);

        //  expression part of code is executing an SQL query and assigning the reply to $queryResult
        $queryResult = HelperDatabase::executeQuery($query, $args, 'insert');

//        dd($queryResult['result']);
//         to debug uncomment
        dd($queryResult['debug']);
        return $queryResult['isSuccess'];
    }

    public static function getCreateRecord(array $parameters, string $controller): bool
    {
        return self::createRecord($parameters, $controller);
    }

    private static function countRecord(string $controller): int
    {
        // initialize the $tableName to use in the $query statement
        $tableName = '';

        // from the array of DBTABLELIST identify the $tableName by comparing the corresponding controller
        foreach (DBConstants::DBTABLELIST as $key => $value) {
            if ($value === $controller) {
                $tableName = $key;
            }
        }

        $query = "SELECT count(*) as total FROM $tableName";

        $args = [];

        $queryResult = HelperDatabase::executeQuery($query, $args, 'read');

        if ($queryResult['isSuccess']) {
            return $queryResult['result'][0]['total'];
        }

        return 0;
    }

    public static function getCountRecord(string $controller): int
    {
        return self::countRecord($controller);
    }

    private static function viewRecord(string $controller): array|string
    {
        // initialize the $tableName to use in the $query statement
        $tableName = '';

        // from the array of DBTABLELIST identify the $tableName by comparing the corresponding controller
        foreach (DBConstants::DBTABLELIST as $key => $value) {
            if ($value === $controller) {
                $tableName = $key;
            }
        }

        $query = "SELECT * FROM $tableName";

        $args = [];

        $queryResult = HelperDatabase::executeQuery($query, $args, 'read');

        return $queryResult['result'];
    }

    public static function getViewRecord(string $controller): array|string
    {
        return self::viewRecord($controller);
    }

    private static function eachRecord(string $controller, int $id): array|bool
    {
//        dd($controller);
        // initialize the $tableName to use in the $query statement
        $tableName = '';
        $id = $id ?? 0;

        // from the array of DBTABLELIST identify the $tableName by comparing the corresponding controller
        foreach (DBConstants::DBTABLELIST as $key => $value) {
            if ($value === $controller) {
                $tableName = $key;
            }
        }

        // initialize and assign the value to $idIdentifier
        $idIdentifier = DBConstants::IDIDENTIFIER[$controller];

        // now make the $args array key
        $argsKey = ":" . $idIdentifier;

        // now make $argsArray
        $argsArray = [
            $argsKey => $id,
        ];

        $query = "SELECT * FROM $tableName WHERE $idIdentifier = $argsKey";

        $args = $argsArray;

//        dd($query);

        $queryResult = HelperDatabase::executeQuery($query, $args, 'read');

        return [
            'isSuccess' => $queryResult['isSuccess'],
            'result' => $queryResult['result']
        ];
    }

    public static function getEachRecord(string $controller, int $id): array|bool
    {
        return self::eachRecord($controller, $id);
    }

    private static function updateRecord(array $parameters, string $controller): bool
    {
        // initialize the $tableName to use in the $query statement
        $tableName = '';

        // from the array of DBTABLELIST identify the $tableName by comparing the corresponding controller
        foreach (DBConstants::DBTABLELIST as $key => $value) {
            if ($value === $controller) {
                $tableName = $key;
            }
        }

        // initialize the $queryFieldNames
        $queryFieldNames = [];

        // get all the fieldnames from DBFIELDLIST and assign to $queryFieldNames
        foreach (DBConstants::DBFIELDLIST[$controller] as $key => $value) {
            $queryFieldNames[] = $key;
        }

        // initialize and assign the value to $idIdentifier
        $idIdentifier = DBConstants::IDIDENTIFIER[$controller];
        $argsId = ":" . $idIdentifier;

        // array of each fieldName and its assignment except the $idIdentifier
        $queryFieldStringArray = [];
        foreach ($queryFieldNames as $fieldName) {
            if ($idIdentifier !== $fieldName) {
                $queryFieldStringArray[] = "$fieldName = :$fieldName";
            }
        }

        // query with corresponding table field and assignment value into a string
        $queryFieldString = implode(', ', $queryFieldStringArray);

        //code is creating an associative array ($argsArray) where keys are formed by prefixing each field name
        // from $queryFieldNames with a colon (:), and the corresponding values are taken from the $parameters array
        $argsArray = [];
        foreach ($queryFieldNames as $fieldName) {
            $argsArray[":$fieldName"] = $parameters[$fieldName] ?? null;
        }

        // final query string made by concatenating different parts of the query
        $query = "UPDATE $tableName SET ";
        $query .= $queryFieldString;
        $query .= " WHERE $idIdentifier = $argsId";

        // assignment of $args accordingly
        $args = $argsArray;

        // check the $query before database insertion stops further execution of code as well
        dd($query);

        //  expression part of code is executing an SQL query and assigning the reply to $queryResult
        $queryResult = HelperDatabase::executeQuery($query, $args, 'insert');

        return $queryResult['isSuccess'];
    }

    public static function getUpdateRecord(array $parameters, string $controller): bool
    {
        return self::updateRecord($parameters, $controller);
    }

    private static function deleteRecord(string $controller, int $id): bool
    {
        // initialize the $tableName to use in the $query statement
        $tableName = '';

        // from the array of DBTABLELIST identify the $tableName by comparing the corresponding controller
        foreach (DBConstants::DBTABLELIST as $key => $value) {
            if ($value === $controller) {
                $tableName = $key;
            }
        }

        // initialize and assign the value to $idIdentifier
        $idIdentifier = DBConstants::IDIDENTIFIER[$controller];

        // now make the $args array key
        $argsKey = ":" . $idIdentifier;

        // now make $argsArray
        $argsArray = [
            $argsKey => $id,
        ];

        $query = "DELETE FROM $tableName WHERE $idIdentifier = $argsKey";

        $args = $argsArray;

        dd($query);

        $queryResult = HelperDatabase::executeQuery($query, $args, 'insert');

        //returns bool value
        return $queryResult['isSuccess'];
    }

    public static function getDeleteRecord(string $controller, int $id): bool
    {
        return self::deleteRecord($controller, $id);
    }

    // registration method
    private static function createUser(array $params): bool
    {
//        dd($params);
        $userId = mt_rand(0, 100000);
        $userFirstName = $params['userFirstName'];
        $userLastName = $params['userLastName'];
        $userEmail = $params['userEmail'];
        $userPassword = $params['userPassword'];
        $userAge = $params['userAge'];
        $userPhone = $params['userPhone'];
        $userAddress = $params['userAddress'];
        $userCountry = $params['userCountry'];
        $isAdmin = $params['isAdmin'];

        $args = [
            ':userId' => $userId,
            ':userFirstName' => $userFirstName,
            ':userLastName' => $userLastName,
            ':userEmail' => $userEmail,
            ':userPassword' => $userPassword,
            ':userAge' => $userAge,
            ':userPhone' => $userPhone,
            ':userAddress' => $userAddress,
            ':userCountry' => $userCountry,
            ':isAdmin' => $isAdmin,
        ];

        $query = "INSERT into sstuser (userId, userFirstName, userLastName, userEmail, userPassword, userAge, userPhone, userAddress, userCountry, isAdmin)
                    VALUES (:userId, :userFirstName, :userLastName, :userEmail, :userPassword, :userAge, :userPhone, :userAddress, :userCountry, :isAdmin)";

//        dd($query);
        $queryResult = HelperDatabase::executeQuery($query, $args, 'insert');

//        dd($queryResult);
        return $queryResult['isSuccess'];
    }

    public static function getCreateuser(array $params): bool
    {
        return self::createUser($params);
    }


    // the following are the specialized query methods for exceptional cases and query with clauses

    // need to fetch data of only one or more columns
    private static function fetchColumn(string $controller, array $columns)
    {
        // initialize the $tableName to use in the $query statement
        $tableName = '';

        // from the array of DBTABLELIST identify the $tableName by comparing the corresponding controller
        foreach (DBConstants::DBTABLELIST as $key => $value) {
            if ($value === $controller) {
                $tableName = $key;
            }
        }

        // the following is how we can get multiple columns by simply adding in the array when calling the method
//        $columns = ['collegeName', 'collegeCountry'];

        // initialize and assign the columnName/s
        $columnNames = implode(', ', $columns);

        // make the query using the $columnNames and $tableName strings
        $query = "SELECT $columnNames FROM $tableName";

        $args = [];

//        dd($query);

        $queryResult = HelperDatabase::executeQuery($query, $args, 'read');

        return $queryResult['result'];
    }

    public static function getFetchColumn(string $controller, array $columns)
    {
        return self::fetchColumn($controller, $columns);
    }

    private static function fetchColumnWithClause(string $controller, string $idFieldName, array $params)
    {
        // initialize the $tableName to use in the $query statement
        $tableName = '';

        // from the array of DBTABLELIST identify the $tableName by comparing the corresponding controller
        foreach (DBConstants::DBTABLELIST as $key => $value) {
            if ($value === $controller) {
                $tableName = $key;
            }
        }

        // initialize and assign the value to $idIdentifier and assign the value of the idIdentifier
        foreach ($params as $idName => $idValue) {
            $idIdentifier = $idName;

            // now make the $args array key
            $argsKey = ":" . $idIdentifier;

            // now make $argsArray
            $argsArray = [
                $argsKey => $idValue,
            ];

            // make the query using the $columnNames and $tableName strings
            $query = "SELECT $idFieldName FROM $tableName WHERE $idIdentifier = $argsKey";

            $args = $argsArray;

//            dd($query);

            $queryResult = HelperDatabase::executeQuery($query, $args, 'read');

//            dd($queryResult['result']);
//            dd($queryResult['debug']);
            return $queryResult['result'];
        }

        return [];
    }

    public static function getFetchColumnWithClause(string $controller, string $idFieldName, array $params)
    {
        return self::fetchColumnWithClause($controller, $idFieldName, $params);
    }

    private static function viewRecordWithLimit(string $controller, int $limit, int $offset): array|string
    {
        // initialize the $tableName to use in the $query statement
        $tableName = '';

        // from the array of DBTABLELIST identify the $tableName by comparing the corresponding controller
        foreach (DBConstants::DBTABLELIST as $key => $value) {
            if ($value === $controller) {
                $tableName = $key;
            }
        }

        $query = "SELECT * FROM $tableName LIMIT $limit OFFSET $offset";

        $args = [];

        $queryResult = HelperDatabase::executeQuery($query, $args, 'read');

        $queryResult = HelperDatabase::executeQuery($query, $args, 'read');

        if ($queryResult['isSuccess']) {
            return $queryResult['result'];
        }

        return [];
    }

    public static function getViewRecordWithLimit(string $controller, int $limit, int $offset): array|string
    {
        return self::viewRecordWithLimit($controller, $limit, $offset);
    }

    private static function viewSearchWithLimit(
        string $searchQuery,
        string $controller,
        int $limit,
        int $offset
    ): array|string {
        // initialize the $tableName to use in the $query statement
        $tableName = '';

        // from the array of DBTABLELIST identify the $tableName by comparing the corresponding controller
        foreach (DBConstants::DBTABLELIST as $key => $value) {
            if ($value === $controller) {
                $tableName = $key;
            }
        }

        $tableColumns = [];
        // find the columnss
        foreach (DBConstants::DBFIELDLIST[$controller] as $key => $value) {
            $tableColumns[] = "IFNULL($value, '')";
        }

        $columnsConcatenated = "CONCAT_WS(' ', " . implode(', ', $tableColumns) . ")";

        $query = "SELECT * FROM $tableName WHERE CONCAT($columnsConcatenated) LIKE :searchQuery LIMIT $limit OFFSET $offset";

        $args = [
            ':searchQuery' => '%' . $searchQuery . '%',
        ];

//        dd($query);
        $queryResult = HelperDatabase::executeQuery($query, $args, 'read');


//        dd($queryResult['result']);
//        dd($queryResult['debug']);

        if ($queryResult['isSuccess']) {
            return $queryResult['result'];
        }

        return [];
    }

    public static function getViewSearchWithLimit(
        string $searchQuery,
        string $controller,
        int $limit,
        int $offset
    ): array|string {
        return self::viewSearchWithLimit($searchQuery, $controller, $limit, $offset);
    }

}

