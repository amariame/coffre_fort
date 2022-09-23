<?php

namespace Validations;

abstract class Validation
{
    protected $valid;

    public function __construct(){
        $this->valid = false;
    }

    public abstract function validate($post_values);

    public function is_valid(){
        return $this->valid;
    }
}