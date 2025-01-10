<?php
class Config
{
    public static function GetConnection()
    {
        try {
            $dsn = "mysql:dbname=rms";
            $un = "root";
            $pw = "";
            $conn = new PDO($dsn, $un, $pw);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
}
