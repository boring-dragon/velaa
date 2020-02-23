<?php
namespace App\Models;

class Post {
    // Class properties
    public $id;
    public $title;
    public $body;

    // Class configuration
    static $table = 'posts';
    static $id_field = 'id';
    //static $name_field = '';
}