<?php

class Db
{
    private $host = 'localhost';
    private $database = 'test';
    private $charset = 'utf8';
    private $user = 'root';
    private $password = '';
    public $connection;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=$this->host; dbname=$this->database; charset=$this->charset", $this->user, $this->password);
    }

    public function query($query)
    {
        return $this->connection->query($query);
    }
}