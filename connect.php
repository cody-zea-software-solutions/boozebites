<?php
class Database
{

    public static $connection;

    public static function setUpConnection()
    {

        if (!isset(Database::$connection)) {
            if (!Database::$connection) {

                // Database::$connection = new mysqli("localhost", "root", "denuwan123A", "u426526638_coir", "3306");
                Database::$connection = new mysqli("localhost", "root", "Sahan2005@mysql", "boost_bite", "3306");

                if (Database::$connection->connect_error) {
                    die('Connection failed: ' . Database::$connection->connect_error);
                }
            }
        }
    }

    public static function iud($q)
    {

        Database::setUpConnection();
        Database::$connection->query($q);
    }

    public static function search($q)
    {
        Database::setUpConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }
}
