<?php

namespace App;

trait Auth{

    
    public function attempte(array $credentials):bool {
        
        $user = $this->query("SELECT * FROM users WHERE users.username=? limit 1",[$credentials[0]]);
        if($user && password_verify($credentials[1],$user->password)){
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            }
            else
            {
                session_destroy();
                session_start(); 
            }
            $_SESSION['user'] = $user;
            $_SESSION['auth'] = true;

            return true;
        }
        return false;
    }

    
}