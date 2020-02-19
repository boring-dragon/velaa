<?php
namespace Velaa\Core\Database;

use Velaa\Core\Database\Sparrow;
use PDO;

class QueryBuilder
{
    protected $pdo;
    private $db;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->db = new Sparrow();
    }

    //Query all the items from the table
    public function all($table)
    {
        $query = $this->db->from($table)->select()->sql();
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    //Query an item with where
    public function where($table, $field, $match)
    {
        $query = $this->db->from($table)->where($field, $match)->select()->sql();
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    //To build an insert query, pass in an array of data to it with table.
    public function insert($table, $data)
    {
        $query = $this->db->from($table)->insert($data)->sql();

        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute();
        } catch (Exception $e) {
            die('Whoops, something went wrong.');
        }
    }
}
