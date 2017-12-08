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
    private static $dbPort = '8082';
    private static $dbUsername = 'postgres';
    private static $dbUserPassword = '17893578951';
    private static $conexion = null;
    function __construct() {
        exit('No se permite instanciar esta clase.');
     }
     public static function connect(){
         if(null == self::$conexion){
             try{
                self::$pg_connect("jdbc:postgresql:host=ec2-23-21-184-113.compute-1.amazonaws.com port=5432 dbname=d9be21sf7evp8g user=sqjxzpbevythta password=7d119514905ecc571b9b77484950dec54fe37c54fa5cdf78a89db4cc732eafda sslmode=require");
                
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