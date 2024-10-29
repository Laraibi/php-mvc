<?php

namespace App\Models;

use App\Database;
use PDO;

class Model
{
    protected static $tableName = "";
    public static function findAll()
    {
        $query = "select * from " . static::$tableName;
        $result = Database::getConnection()->query($query, PDO::FETCH_CLASS, static::class);
        return $result->fetchAll();
    }
    public static function find($id)
    {
        $query = "select * from " . static::$tableName . " where id = :id";
        $result = Database::getConnection()->prepare($query);
        $result->bindParam(':id', $id);
        $result->execute();
        return $result->fetchObject(static::class);
    }

    public static function create(array $payload)
    {
        $fields = implode(" ,", array_keys($payload));
        $values = "";
        foreach ($payload as $key => $value) {
            $values .= ":" . $key . ",";
        }
        $values = substr($values, 0, strlen($values) - 1);
        $query = "insert into " . static::$tableName . " ($fields) VALUES ($values)";
        $result = Database::getConnection()->prepare($query);
        foreach ($payload as $key => $value) {
            $result->bindValue(":$key", $value);
        }
        return $result->execute();
    }

    public function update($payLoad)
    {
        $query = "update " . static::$tableName;
        $query .= " SET ";
        foreach ($payLoad as $field => $value) {
            $query .= "$field =:$field, ";
        }

        $query = rtrim($query, ', ');

        $query .= " where id=:id";
        $result = Database::getConnection()->prepare($query);
        foreach ($payLoad as $field => $value) {
            $result->bindValue(":$field", $value);
        }
        $result->bindValue(":id", $this->id);
        return $result->execute();
    }

    public function delete()
    {
        $query = "delete from " . static::$tableName . " where id = :id";
        $result = Database::getConnection()->prepare($query);
        $result->bindParam(':id', $this->id);
        return $result->execute();
    }
}
