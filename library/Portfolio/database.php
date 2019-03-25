<?php 
class Database{
    private static $user = 'root';
    private static $pass = 'root';
    private static $db = 'stocks';
    private static $dns = 'mysql:host=localhost;dbname=stocks';
    private static $dbcon;
    
    private function __construct(){
        
    }
    public static function getDB(){
        if(!isset(self::$dbcon)){
            try{
                self::$dbcon = new PDO(self::$dns, self::$user, self::$pass);
                self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                exit();
            }
        }
        return self::$dbcon;
    }
}