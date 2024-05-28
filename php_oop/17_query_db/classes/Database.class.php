<?php

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "phpoop16";

    public function connect()
    {
        $dataSourceName = "mysql:host=$this->host;dbname=$this->dbName;";

        $pdo = new PDO($dataSourceName, $this->user, $this->pwd);

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}
