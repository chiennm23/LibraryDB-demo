<?php


class DBConnect
{
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->dsn = 'mysql:host=localhost;dbname=Library_Data';
        $this->username = 'root';
        $this->password = 'Chien@123';
    }

    public function connect()
    {
        return new PDO($this->dsn, $this->username, $this->password);
    }
}