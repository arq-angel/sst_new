<?php

declare(strict_types=1);

namespace Modules;

use DateTime;
use PDO, PDOException;

//require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Modules/Database.php';


class HelperDatabase
{

    public static function executeQuery($query, $args, $type = RES['db_read']): array
    {
        return self::executeDatabaseQuery($query, $args, $type);
    }

    public static function getSysDateTime(): string
    {
        $currentDateTime = new DateTime();
        return $currentDateTime->format('Y-m-d H:i:s');
    }

    private static function executeDatabaseQuery($query, $args, $type): array
    {
        $con = Database::getConnection();
        $returnMsg = [];
        if ($con['isSuccess']) {
            try {
                $stmt = $con['result']->prepare($query);
                $res = $stmt->execute($args);

                if ($type === RES['db_read']) {
                    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }

                $returnMsg = [
                    'isSuccess' => true,
                    'result' => $res,
                    'debug' => '',
                ];
            } catch (PDOException $e) {
                $returnMsg = [
                    'link_id' => $args,
                    'isSuccess' => false,
                    'result' => APP_MESSAGE['Err_Cx000002']['message'],
                    'debug' => $e->getMessage(),
                ];
            }
        } else {
            $returnMsg = [
                'isSuccess' => false,
                'result' => APP_MESSAGE['Err_Cx000002']['message'],
                'debug' => $con['debug'],
            ];
        }
        return $returnMsg;
    }

    public static function executeQueryB($sql, $args, $returnBool = true, $type = null): bool|array
    {
        return self::executeSQL($sql, $args, $returnBool, $type);
    }

    private static function executeSQL($sql, $args, $returnBool, $type): bool|array
    {
        $con = Database::getConnection();
        $return = [];

        if ($con['isSuccess']) {
            $stmt = $con['result']->prepare($sql);

            try {
                $result = $stmt->execute($args);
            } catch (PDOException $e) {
                // exception handling
                $result = false;
                $res = $e->getMessage();
            }

            // Actions to read information - incomplete implementation
            // Here, we are passing $type as null so it goes into second condition
            if ($type === RES['db_read'] && $result) {
//                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $res = ($result ? 'Database Action Completed.' : 'Database Action Failed!');
            }

            $returnMessage = [
                'isSuccess' => true,
                'result' => $res,
            ];
        } else {
            $returnMessage = [
                'isSuccess' => false,
                'result' => 'Something went wrong.',
            ];
        }

        //This is only returning the bool value
        if ($returnBool) {
            return $returnMessage['isSuccess'];
        }
        return $returnMessage;
    }
}
