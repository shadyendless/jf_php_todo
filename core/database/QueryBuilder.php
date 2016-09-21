<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $parameters)
    {
        // INSERT INTO %s (%s) VALUES (%s)
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            die('Whoops, something went wrong.');
        }
    }

    public function update($table, $id, $parameters)
    {
        // UPDATE %s SET %s=%s WHERE $s=%s
        $sql = sprintf(
            'UPDATE %s SET %s WHERE id=%s',
            $table,
            implode(',', array_map(function($parameter) {
                return "$parameter=:$parameter";
            }, array_keys($parameters))),
            $id
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=$id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }
}
