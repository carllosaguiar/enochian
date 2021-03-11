<?php


namespace App\Config;
use PDO;
use PDOException;

class Connection
{

    private $connection;

    public function getConnection(): PDO
    {
        if (empty($this->connection)) {
            $params = parse_ini_file('config/enochian.ini');
            $host = $params['host'];
            $dbname = $params['dbname'];
            $user = $params['user'];
            $pass = $params['pass'];
            try {
                $this->connection = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $this->connection;
    }

}