<?php

namespace Validations;

class ValideUserForm extends Validation
{

    function validate($post_values){
    
        $errors = array();
        $username = filter_var($post_values['username'],FILTER_SANITIZE_STRING);
        $first_name = filter_var($post_values['first_name'],FILTER_SANITIZE_STRING);
        $last_name = filter_var($post_values['last_name'],FILTER_SANITIZE_STRING);
        $email = filter_var($post_values['email'],FILTER_SANITIZE_EMAIL);
        $password = $post_values['password'];
        $confirm_password = $post_values['confirm_password'];
        $cgu = isset($post_values['cgu'])?true:false;
        
        //valide le champ nom
        if(isset($nuserame) && empty($username)){
            $errors['username'] = "Le champ username est obligatoire";
        }
        elseif(strlen($username)<4){
            $errors['username'] = "Le champ username au moins 5 caractères";
        }


        //valide le champ nom
        if(isset($first_name) && empty($first_name)){
            $errors['first_name'] = "Le champ nom est obligatoire";
        }
        elseif(strlen($first_name)<3){
            $errors['first_name'] = "Le champ nom au moins 3 caractères";
        }

        //valide le champ nom
        if(isset($last_name) && empty($last_name)){
            $errors['last_name'] = "Le champ prenom est obligatoire";
        }
        elseif(strlen($last_name)<3){
            $errors['last_name'] = "Le champ prenom au moins 3 caractères";
        }

        //valide le champ email
        if(isset($email) && empty($email)){
            $errors['email'] = "Le champ email est obligatoire";
        }
        /*elseif(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "L'email n'est pas valid";
        }*/

        //valide le champ projet
        if(isset($password) && empty($password)){
            $errors['password'] = "Le champ password est obligatoire";
        }
        elseif(strlen($password)<8){
            $errors['password'] = "Le champ password doit au moins 8 caractères";
        }
        elseif(!preg_match('/[A-Z]+.*[0-9]+.*[^\w]+|[A-Z]+.*[^\w]+.*[0-9]+|[0-9]+.*[A-Z]+.*[^\w]+|[0-9]+.*[^\w]+.*[A-Z]+|[^\w]+.*[A-Z]+.*[0-9]+|[^\w]+.*[0-9]+.*[A-Z]+/',$password)){
            $errors['password'] = "Le champ password doit contenir masucule, miniscule et caractere speciaux";
        }
        elseif(!$password===$confirm_password){
            $errors['password'] = "La confirmation du mot de passe est different";
        }

        if(!$cgu){
            $errors['cgu'] = "Veillez accepter les conditions general d'utlisation";
        }

        

        if(empty($errors)){
            $this->valid = true;
        }else{
            $_SESSION['errors'] = $errors;
            $_SESSION['post'] = $post_values;
            $this->valid = false;
        }
        
    }
}