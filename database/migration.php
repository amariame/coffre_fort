<?php
namespace Database;

require(__DIR__.'/../config/Config.php');
use Configuration\Config;

$config = Config::info_con();

try{
    $pdo = new \PDO("mysql:host=".$config['host'].":".$config['port'],$config['dbuser'],$config['dbpassword']);
    $pdo->prepare("CREATE DATABASE IF NOT EXISTS ".$config['dbname'])->execute();
    $pdo->prepare("use ".$config['dbname']."")->execute();


    $pdo->prepare("DROP TABLE IF EXISTS users")->execute();
    $pdo->prepare('SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"')->execute();
    //$pdo->prepare('SET time_zone = "+01:00"')->execute();

    $pdo->prepare("
        CREATE TABLE IF NOT EXISTS `sessions` (
            `session_id` varchar(255) NOT NULL,
            `session_ip` varchar(30) NOT NULL,
            `session_xforwarded` varchar(30) NOT NULL,
            `session_agent` varchar(255) NOT NULL,
            `session_userid` int(11) NOT NULL,
            `session_start` int(11) NOT NULL,
            `session_last` int(11) NOT NULL,
            `session_vars` varchar(1024) NOT NULL,
            UNIQUE KEY `session_id` (`session_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1
    ")->execute();


    $pdo->prepare("
        CREATE TABLE `users` (
            `id` int(11),
            `first_name` varchar(100) NOT NULL,
            `last_name` varchar(100) NOT NULL,
            `email` varchar(100) NOT NULL UNIQUE,
            `username` varchar(100) NOT NULL UNIQUE,
            `password` varchar(100) NOT NULL,
            `inscriptionDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1
    ")->execute();
    $pdo->prepare("ALTER TABLE `users`   ADD PRIMARY KEY (`id`)")->execute();
    $pdo->prepare(" ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT")->execute();

    $pdo->prepare("INSERT INTO users (`username`,`first_name`,`last_name`,`email`,`password`    ) values(?,?,?,?,?)")->execute(['users','utilisateur','demo','user@info.test',password_hash('User@2022',PASSWORD_BCRYPT)]);
    
    $pdo->prepare("COMMIT")->execute();


    $pdo=null;
}catch(PDOException $e){
    echo $e->getMessage();
}