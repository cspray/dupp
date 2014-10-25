<?php

/**
 * 
 * @license See LICENSE in source root
 * @version 1.0
 * @since   1.0
 */

namespace Dupp;

use PHPUnit_Extensions_Database_TestCase as DbUnitTestCase;
use PDO;

abstract class DatabaseTestCase extends DbUnitTestCase {

    static private $pdo = null;
    private $conn = null;

    final public function getConnection() {
        if ($this->conn === null) {
            $creds = $this->getDatabaseCredentials();
            $this->createPdo($creds);
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $creds->getSchema());
        }

        return $this->conn;
    }

    public function getPdo() {
        if (self::$pdo == null) {
            $this->createPdo($this->getDatabaseCredentials());
        }

        return self::$pdo;
    }

    private function createPdo(DatabaseCredentials $creds) {
        if (self::$pdo == null) {
            self::$pdo = new PDO($creds->getDsn(), $creds->getUser(), $creds->getPassword());
        }
    }

    /**
     * @return DatabaseCredentials
     */
    abstract protected function getDatabaseCredentials();

} 
