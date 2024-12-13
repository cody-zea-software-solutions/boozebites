<?php
class Database{
    public static $connection;

    public static function SetupConnection(){
        if(!isset(Database::$connection)){
            // Database::$connection = new mysqli("localhost", "root", "denuwan123A", "u426526638_boozebites", "3306");
            Database::$connection = new mysqli("localhost", "u426526638_booze", "denuwan123A", "u426526638_boozebites", "3306");
            // Database::$connection = new mysqli("localhost", "u426526638_booze", "boozebites123A", "u426526638_boozebites", "3306");
        }
    }

    public static function Search($q){
        Database::SetupConnection();
        $resultset = Database::$connection->query($q);

        return $resultset;
    }

    public static function IUD($q){
        Database::SetupConnection();
        Database::$connection->query($q);
    }
}
?>