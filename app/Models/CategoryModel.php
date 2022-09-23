<?php

namespace Models;
use Entity\Categories;

class CategoryModel extends Model
{
    protected $attributes = ['category'];
    protected static $table = "categories";

}