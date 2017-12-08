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
    private static $dbName = 'heroku_bed8d7e563b7b30';
    private static $dbHost = 'us-cdbr-iron-east-05.cleardb.net';
    private static $dbUsername = 'ba78fed948b3f9';
    private static $dbUserPassword = '4bf7c3d3';
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