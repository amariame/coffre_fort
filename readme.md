## Table of Contents
1. [Information générale](#general-info)
2. [Technologies](#technologies)
3. [Installation](#installation)
4. [Collaborateurs](#collaborateurs)
### General Info
***
#### Projet de fin cours
Le projet consiste à créer un logiciel permettant de stocker de manière sécurisée des documents sur un serveur (une sorte de coffre-fort numérique partageable) en les regroupant par
répertoires. L’accès a un répertoire pourra se faire avec deux niveaux de privilège : en mode consultation ou en mode édition.

L'application aura les fonctionnalités suivantes



## Technologies
***

* Package
    * [altourer](github.com/dannyvankooten/AltoRouter): Pour le routage
    * [Whoops](github.com/filp/whoops): l'affichage des erreurs
    * [Symfony filesystem](github.com/symfony/filesystem): Gestion des fichiers et repertoire
* [DeskApp](https://dropways.github.io/deskapp/)

## Installation
***
### Pré-requis
  - MYSQL 8.x
  - Composer
  - PHP 8.x
### Comment installer le projeet
```
$ git clone https://github.com/amariame/coffre_fort.git
$ cd coffre_fort
$ composer install
```

### Configuration de la base de données
Dans le fichier config/Config.php modifier cette ligne
  * bdname : Nom de votre base de données
  * host : Adresse serveur de base de données
  * port : port du serveur 
  * dbuser : Utilisateur
  * dbpassword : Mot de passe
 ```
  //Connexion data base
    public static function info_con(){
        return [
            "host" => "localhost",
            "port" => "3306",
            "dbname" => "coffre_fort",
            "dbuser" => "amar",
            "dbpassword" => "5991.Amar"
        ];
    }
 ```
 


### Création, migration et population des table
```
php database/migration.php
```


#### Utilisateur : Utilisateur Demo
> username : users
>
> password : User@2022


### Lancer le server de developpement local PHP
```
php -S 127.0.0.1:8000 -t ./public
```
Lancez votre navigateur avec [127.0.0.1:8000]()


## Collaborateurs
***
[Abdoul AROWOLO](https://github.com/E196470E)
[Joel Kalala DIBALA](https://github.com/Kalaladibala )
[Angelau Garriel BELLEGARDE](https://github.com/AngeGarry)
