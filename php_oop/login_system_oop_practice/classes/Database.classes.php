<?php

declare(strict_types=1);

class Database
{
    private string $host_name = "localhost";
    private string $user = "root";
    private string $password = "";
    private string $database_name = "ooplogin";

    protected function connect_database()
    {
        $data_source_name = "mysql:host=$this->host_name;
        dbname=$this->database_name";

        try {
            $pdo = new PDO($data_source_name, $this->user, $this->password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Cannot connect to database! Error: " . $e->getMessage();
            exit();
        }

        return $pdo;
    }
}
