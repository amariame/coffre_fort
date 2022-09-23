<?php

namespace Validations;

class ValideLogForm extends Validation
{

    function validate($post_values){
    
        $errors = array();
        $username = $post_values['username'];
        $password = $post_values['password'];
        
        //valide le champ nom
        if(isset($nuserame) && empty($username)){
            $errors['username'] = "Le champ username est obligatoire";
        }

        if(isset($nuserame) && empty($username)){
            $errors['password'] = "Le champ password est obligatoire";
        }

        if(empty($errors)){
            $this->valid = true;
        }else{
            $this->valid = false;
        }
    }
}