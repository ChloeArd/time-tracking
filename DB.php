<?php

namespace Chloe\Timetracking;

use PDO;
use PDOException;

class DB {

    private string $server = 'localhost';
    private string $nameDb = 'time';
    private string $user = 'root';
    private string $password = '';

    private static ?PDO $dbInstance = null;

    /**
     * DB Static constructor.
     * test the connection to database
     */
    public function __construct() {
        try {
            self::$dbInstance = new PDO("mysql:host=$this->server;dbname=$this->nameDb;charset=utf8", $this->user, $this->password);
            self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$dbInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    /**
     * Return PDO instance.
     */
    public static function getInstance(): ?PDO {
        if (null === self::$dbInstance) {
            new self();
        }
        return self::$dbInstance;
    }
}