<?php

namespace Controllers;

use Models\CryptomonnaieModel;
use Models\CategoryModel;
use Configuration\Config;
use Validations\ValideCryptoForm;
use Util\View;
use \Flow\JSONPath\JSONPath;


class CryptomonnaieController
{
    
    private $view;

    public function __construct()
    {
        $this->view = new View;
    }

    public function index(){

       $cryptos = CryptomonnaieModel::getAll();

       $this->view->render('crypto/index',compact('cryptos'));
        
    }

    public function view($id)
    {
        $crypto = CryptomonnaieModel::getOne($id);


        $this->view->render('crypto/view',compact('crypto'));
    }

    public function create(){
        
        $crypto = new CryptomonnaieModel;
        $this->view->render('crypto/create',compact('crypto'));
    }

    public function edit($id){

        $crypto = CryptomonnaieModel::getOne($id);

        $this->view->render('crypto/edit',compact('crypto'));
    }

    public function store($request){
        
        $v = new ValideCryptoForm;
        $v->validate($request);
        
        if(!$v->valid){
            
            header("Location:{$_SERVER['HTTP_REFERER']}");
            exit;
        }

        $crypto = new CryptomonnaieModel;

        $crypto->name = $request['name'];
        $crypto->symbole = strtoupper($request['symbole']);
        $crypto->category = $request['category'];
        $crypto->createdAt = $request['createdAt'];
        $crypto->logo = $request['logo'];
        $crypto->projet = $request['projet'];

        $_SESSION['message']='La cryptomonaie '.strtoupper($crypto->name).' a ete ajouter avec success';
        $crypto->insert();
        
        header("Location:/");
    }

    public function update($request,$id){
        $v = new ValideCryptoForm;
        $v->validate($request);
        
        if(!$v->valid){
            header("Location:{$_SERVER['HTTP_REFERER']}");
            exit;
        }
        $crypto = CryptomonnaieModel::getOne($id);
        $crypto->name = $request['name'];
        $crypto->symbole = strtoupper($request['symbole']);
        $crypto->category = $request['category'];
        $crypto->createdAt = $request['createdAt'];
        $crypto->logo = $request['logo'];
        $crypto->projet = $request['projet'];

        $_SESSION['message']='La cryptomonaie '.strtoupper($crypto->name).' a ete modifier avec success';
        $crypto->update();
        
        header("Location:/");
    }

    public function delete($id){
        $crypto = CryptomonnaieModel::getOne($id);
        $crypto->destroy();
        $_SESSION['message']='La cryptomonaie '.strtoupper($crypto->name).' a ete supprimer avec success';
        header("Location:/");
    }

    public function migration(){
        exec('php '.__DIR__.'/../../database/migration.php');
        $_SESSION['message']='La migration a ete effectuer avec success';
        header("Location:/");
    }
}