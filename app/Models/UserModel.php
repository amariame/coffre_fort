<?php

namespace Models;

use App\Auth;



class UserModel extends Model
{
    use Auth;

    protected $attributes = ["username","first_name","last_name","email","password"];
    protected $dates = ["inscriptionDate"];
    protected static $table = "users";

    protected $hidden = ['password'];


}