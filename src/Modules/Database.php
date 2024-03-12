<?php

declare(strict_types=1);

namespace Modules;
use PDO, PDOException;

const APP_MESSAGE = [
    'Err_Cx000001' => [
        'message' => 'Your error message here.'
    ],
    'Err_Cx000002' => [
        'message' => 'Database Read Action Failed!'
    ],
    'Err_Cx000003' => [
        'message' => 'wrong read type!'
    ],
    'Err_Cx000004' => [
        'message' => 'Could not fetch the information from database!'
    ]
];

const RES = [
    'db_read' => 'read',
];


class Database
{
    private const SERVER = [
        # DATABASE Configs
        'db_host' => '127.0.0.1',
        'db_port' => '3306',
        'db_user' => 'root',
        'db_password' => '',
        'db_database' => 'sstone', // Updated the comment here
        'db_prefix' => '',
        'db_postfix' => '',
    ];

    private static array $db;

    public static function getConnection(): array
    {
        return self::getDBConnection();
    }

    private static function getDBConnection(): array
    {
        # Database Configs
        self::$db = self::SERVER;

        $dsn = 'mysql:host=' . self::$db['db_host'] . ';dbname=' . self::$db['db_database'];
        try {
            $pdo = new PDO($dsn, self::$db['db_user'], self::$db['db_password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return ['isSuccess' => true, 'result' => $pdo];
        } catch (PDOException $e) {
            return [
                'isSuccess' => false,
                'result' => APP_MESSAGE['Err_Cx000001']['message'],
                'debug' => $e->getMessage()
            ];
        }
    }
}
