<?php 
namespace Util;

use Util\View;

class Route
{
    public function __construct($config)
    {   
        if(!preg_match('/^[A-Z]\w+#\w+/',$target)){
            $t = explode('#',$match['target']);
            $class = "Controllers\\".$t[0];
            $class_inst = new $class;
            $match['target'] = array($class_inst, $t[1]);
        }
        
        $uri = explode('/',trim($_SERVER['REQUEST_URI']));
        $param = array();
        //var_dump(explode('/',trim($_SERVER['REQUEST_URI'])));die();

        $namespace = $config["namespace"];
        $controller = empty($uri[1])?$config["defaultController"]:$uri[1];
        $method = empty($uri[2])?$config["defaultMethod"]:$uri[2];
        $class = $namespace."\\".$controller;
        //test si la requete est en post
        if($_POST){
            $param[] = $_POST;
            $param[] = substr($_SERVER['HTTP_REFERER'],-1);
        }
        //recupere les argument passer dans url
        if (!empty($uri[3]))
            $param[] = $uri[3];

        
        if (! class_exists($class)) {
            return $this->not_found();
        }

        if (! method_exists($class, $method)) {
            return $this->not_found();
        }

        $classInstance = new $class;

        call_user_func_array(array($classInstance, $method), $param);
        
    }

    public function not_found()
    {
        $view = new View();
        return $view->render('404');
    }
}


