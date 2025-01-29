<?php

class proses
{
    public $connection;
    public function __construct()
    {
        $server = '127.0.0.1';
        $username = 'root';
        $password = '';
        $dbname = 'sale';
        $kon = $this->connection = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    }

    public function get($field = null, $table = null, $property = null)
    {

        $qw = "SELECT $field FROM $table $property";
        return $this->connection->query($qw);
    }

    public function ambil($field = null, $table = null)
    {

        $qw = "SELECT $field FROM $table";
        return $this->connection->query($qw);
    }


    public function insert($table = null, $value = null)
    {
        $qw = "INSERT INTO $table VALUES($value)";
        return $this->connection->query($qw);
    }


    public function delete($table = null, $condition = null)
    {
        $qw = "DELETE FROM $table WHERE $condition";
        return $this->connection->query($qw);
    }

    public function update($table = null, $value = null, $property = null)
    {
        $qw = "UPDATE $table SET $value WHERE $property";
        return $this->connection->query($qw);
    }
}

$db = new proses;
