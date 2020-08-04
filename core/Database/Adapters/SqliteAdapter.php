<?php

namespace Velaa\Core\Database\Adapters;

use PDO;

class SqliteAdapter
{
    /**
     * make.
     *
     * @return void
     */
    public static function make()
    {
        try {
            $file_db = new PDO('sqlite:'.getenv('DB_DATABASE').'.sqlite3');
            // Set errormode to exceptions
            $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $file_db;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
