<?php

namespace Models;



class CryptomonnaieModel extends Model
{
    
    protected $attributes = ["name","symbole","projet","logo","category","createdAt"];
    protected $dates = ["createdAt"];
    protected static $table = "cryptomonnaies";


}
