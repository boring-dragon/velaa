<?php
namespace Velaa\Core\Database;

class SchemaBuilder
{
    public static function make()
    {
        $db = new \DB\SQL('mysql:host='.getenv('DB_HOST').';port=3306;dbname='.getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'));

        return $schema = new \DB\SQL\Schema($db);
    }
}
