<?php

namespace Models;

use Configuration\Config;



abstract class Model
{


    protected static $connexion;
   
    private $stmnt;
    protected $dates;
    protected static $table;
    protected $attributes;
    protected $hidden;
    
    
    
    /**
     * Etablie la connexion a la base de donnees
     */

    private static function getConnection(){
        

        if(self::$connexion == null){
            $config = Config::info_con();
            try {
                self::$connexion = new \PDO("mysql:host=".$config['host'].";dbname=".$config['dbname'],$config['dbuser'],$config['dbpassword']);
                self::$connexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                $_SESSION['nofif-error']=$e->Message();
                header("Location:/");
            }
        }
                
    }

    public static function execute_query($sql,$params=null)
    {
        self::getConnection();
        $stmnt = self::$connexion->prepare($sql);
        $stmnt->execute($params);
        $stmnt->setFetchMode(\PDO::FETCH_OBJ);

        return $stmnt;
    }

    /**
     * Recupre l'element de la $table en fonction $id
     */
    public static function getOne($id){

        $sql = 'SELECT * FROM '.static::$table.' WHERE id=?';
         
        return self::execute_query($sql,[$id])->fetch();
    }

    public static function getAll(){
        $sql = 'SELECT * FROM '.static::$table;

        return self::execute_query($sql)->fetchAll();
    }

    public static function select(array $attribute){
        self::getConnection();
        $v = null;
        $v = implode(',',$attribute);
        $sql = "SELECT $v FROM ".static::$table;
        
        return self::execute_query($sql)->fetchAll();
    }

    public function insert(){
        
        
        $values=[];
        $v=[];
        foreach($this->attributes as $a){
            
            $values[] = $this->$a;
            $v[] = '?'; 
        }
        foreach($this->dates as $a){
            $this->$a = date('Y-m-d');
        }
        $sql = 'INSERT INTO `'.static::$table.'` ('.implode(',',$this->attributes).') VALUES ('.implode(',',$v).')';
        self::getConnection();
        $stmnt = self::$connexion->prepare($sql);
        $stmnt->execute($values);
    }


    public function update(){
        $values=[];
        $v=[];
        foreach($this->attributes as $a){
            
            $values[] = $this->$a;
            $v[] = "{$a} = ?";
        }
        $v = implode(',',$v);
        $sql = 'UPDATE `'.static::$table.'` SET '.$v.' WHERE id = ?';
        self::getConnection();
        $stmnt = self::$connexion->prepare($sql);
        $stmnt->execute([$this->id]);
    }

    public function destroy(){
        $sql = 'DELETE FROM '.static::$table.' WHERE id = ?';
        self::getConnection();
        $stmnt = self::$connexion->prepare($sql);
        $stmnt->execute([$this->id]);
    }

    public function get(){
        
        return $stmnt->fetchAll();
    }

    public function query($query, array $params = null){
        self::getConnection();
        $stmnt = self::$connexion->prepare($query);
        $stmnt->execute($params);
        $stmnt->setFetchMode(\PDO::FETCH_OBJ);
        return $stmnt->fetchObject();
    }
    
    
}