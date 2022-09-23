<?php

namespace Validations;

class ValideCryptoForm
{

    function validate($post_values){
    
        $errors = array();
        $name = filter_var($post_values['name'],FILTER_SANITIZE_STRING);
        $symbole = filter_var($post_values['symbole'],FILTER_SANITIZE_STRING);
        $projet = filter_var($post_values['projet'],FILTER_SANITIZE_STRING);
        $category = filter_var($post_values['category'],FILTER_SANITIZE_STRING);
        $logo = filter_var($post_values['logo'],FILTER_SANITIZE_URL);
        
        //valide le champ nom
        if(isset($name) && empty($name)){
            $errors['name'] = "Le champ name est obligatoire";
        }
        elseif(strlen($name)<3){
            $errors['name'] = "Le champ name au moins 3 caractères";
        }

        //valide le champ symbole
        if(isset($symbole) && empty($symbole)){
            $errors['symbole'] = "obligatoire";
        }
        elseif(strlen($symbole)<3 || strlen($symbole)>5){
            $errors['symbole'] = "3-5 caractères";
        }

        //valide le champ projet
        if(isset($projet) && empty($projet)){
            $errors['projet'] = "Le champ projet est obligatoire";
        }
        elseif(strlen($projet)<5){
            $errors['projet'] = "Le champ projet doit au moins 5 caractères";
        }

        if(isset($category) && empty($category)){
            $errors['projet'] = "Le champ category est obligatoire";
        }
        elseif(strlen($category)<5){
            $errors['category'] = "Au moins 5 caractères";
        }

        if(isset($logo) && empty($logo)){
            $errors['logo'] = "Le champ logo est obligatoire";
        }
        elseif(filter_var($post_values['logo'],FILTER_VALIDATE_URL)=== false){
            $errors['logo'] = "L'addresse du logo n'est pas valide";
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