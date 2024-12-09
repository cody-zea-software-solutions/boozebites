<?php
class Database{
    public static $connection;

    public static function SetupConnection(){
        if(!isset(Database::$connection)){
            Database::$connection = new mysqli("localhost", "root", "Sahan2005@mysql", "boost_bite", "3306");
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