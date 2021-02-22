<?php

class Database {

    private static $dbName = 'controlescolar';
    private static $dbUsername = 'root';
    private static $dbUserPass = 'admin';
    private static $dbHost = 'localhost';
    private static $conn = null;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function connect() {
        if (null == self::$conn) {
            try {
                self::$conn = new PDO("mysql:host=".self::$dbHost.";"."dbname=". self::$dbName, self::$dbUsername, self::$dbUserPass);
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
        return self::$conn;
    }
    
    public static function disconnect(){
        self::$conn = null;
    }

}
