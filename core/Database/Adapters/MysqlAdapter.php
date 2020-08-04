<?php

namespace Velaa\Core\Database\Adapters;

use PDO;

class MysqlAdapter
{
    public static function make()
    {
        $options = [
            PDO::ATTR_PERSISTENT            => true,
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND    => 'SET NAMES UTF8',
        ];

        try {
            return new PDO('mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), $options);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
