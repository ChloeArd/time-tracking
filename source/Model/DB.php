<?php

namespace Chloe\Timetracking\Model;

use PDO;
use PDOException;
use RedBeanPHP\R;

class DB {

    private string $server = 'localhost';
    private string $nameDb = 'time_v2';
    private string $user = 'root';
    private string $password = '';

    private static ?PDO $dbInstance = null;

    /**
     * DB Static constructor.
     * test the connection to database
     */
    public function __construct() {
        try {
            R::setup("mysql:host=$this->server;dbname=$this->nameDb;charset=utf8", $this->user, $this->password);
            R::getDatabaseAdapter()->getDatabase()->stringifyFetches(false);
            R::getDatabaseAdapter()->getDatabase()->getPDO()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

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