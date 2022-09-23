<?php

namespace Configuration;

class Config
{
    //Controlleur
    public static function get(){
        return [
            "namespace" => "Controllers",
            "defaultController" => "HomeController",
            "defaultMethod" => "index"    
        ];
    }

    //Connexion data base
    public static function info_con(){
        return [
            "host" => "localhost",
            "port" => "3306",
            "dbname" => "coffre_fort",
            "dbuser" => "root",
            "dbpassword" => "password"
        ];
    }

    public static function public_path(){
        return __DIR__.'/../public';
    }

}
