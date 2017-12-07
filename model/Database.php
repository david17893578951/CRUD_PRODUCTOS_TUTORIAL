<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author Cris
 */
class Database {
    private static $dbName = 'productoss';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'deif';
    private static $dbUserPassword = '17893578951';
    private static $conexion = null;
    function __construct() {
        exit('No se permite instanciar esta clase.');
     }
     public static function connect(){
         if(null == self::$conexion){
             try{
                self::$conexion = new PDO("mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
                
             }catch(PDOException $e){
                 die($e->getMessage());
             }
         }
         return self::$conexion;
     }
     public static function disconnect(){
         self::$conexion=null;
     }

}
?>