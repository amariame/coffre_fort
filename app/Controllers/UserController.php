<?php

namespace Controllers;

use Models\UserModel;
use Validations\ValideUserForm;
use Validations\ValideLogForm;
use Configuration\Config;
use Util\View;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

class UserController
{
    private $view;

    public function __construct()
    {
        $this->view = new View;
    }

    public function create(){
        $this->view->render('connexion/register');
    }

    public function store($request){
        
        $v = new ValideUserForm;
        $v->validate($request);
        
        if(!$v->is_valid()){
            
            header("Location:{$_SERVER['HTTP_REFERER']}");
            exit;
        }

        $user = new UserModel();
        $user->username =$request['username'];
        $user->first_name =strtoupper($request['first_name']);
        $user->last_name =ucfirst($request['last_name']);
        $user->email =$request['email'];
        $user->password =password_hash($request['password'], PASSWORD_BCRYPT);
        
        $user->insert();

        $filesystem = new Filesystem();
        $filesystem->mkdir(Config::public_path().'/users//'.$user->username, 0700);

        $_SESSION['message']='Veillez-vous connecter '.$user->username;
        header("Location:/login");
        exit;
    }

    public function logform()
    {
        $this->view->render('connexion/login');
    }

    public function login($request)
    {
        $v = new ValideLogForm;
        $v->validate($request);

        if(!$v->is_valid()){
            header("Location:{$_SERVER['HTTP_REFERER']}");
            exit;
        }
        $user = new UserModel();
        if($user->attempte([$request['username'],$request['password']])){
            header("Location:/");
            exit;
        }
        else{
            $_SESSION['flash'] = 'Votre identifiant ou mot de passe incorrecte';
            header("Location:{$_SERVER['HTTP_REFERER']}");
            exit;
        }
        
        
        //var_dump($u);
    }

    public function logout()
    {
        session_destroy();
        session_unset();
        header("Location:/login");
        exit;

    }


    public function home(){
        /*//echo Config::public_path();
        $scanFolder=new ScanFolder();
        $scanFolder->displaySystemFiles(true);
        $scanFolder->setExtra(true);
        $files=$scanFolder->listfiles(Config::public_path().'/users/joel');
        print_r($files);*/

        $finder = new Finder();
        // find all files in the current directory
        $finder->in(Config::public_path().'/users//'.$_SESSION['user']->username);
        

        $this->view->render('coffre/home',compact('finder'));
    }

}