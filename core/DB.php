<?php

namespace app\core;

use \PDO, \PDOException;

class DB
{
    private static $connect;
    public function __construct($servername, $username, $password, $dbname)
    {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connect = $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public static function query(string $sql, ...$parameters)
    {
        $gt = self::$connect->prepare($sql);
        if (!empty($parameters)) {
            foreach ($parameters as $key => $value) {
                $gt->bindValue($key + 1, $value);
            }
        }
        $gt->execute();
        return $gt;
    }
}
