<?php

namespace src\core;

use PDO;
use PDOException;

class Database {

    private $dbConnection = null;

    public function __construct()
    {
        try {
            // host is db because is a name defined in docker-composer.yml
            
            $this->dbConnection = new PDO('mysql:host=db;dbname=challenge', "challenge_user", "challenge");
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->dbConnection;
    }
}