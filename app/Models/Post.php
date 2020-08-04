<?php

namespace App\Models;

class Post
{
    // Class properties
    public $id;
    public $title;
    public $body;

    // Class configuration
    public static $table = 'posts';
    public static $id_field = 'id';
    //static $name_field = '';
}
