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
            if (self::$pdo == null) {
                $creds = $this->getDatabaseCredentials();
                self::$pdo = new PDO($creds->getDsn(), $creds->getUser(), $creds->getPassword());
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, ':memory:');
        }

        return $this->conn;
    }

    /**
     * @return DatabaseCredentials
     */
    abstract protected function getDatabaseCredentials();

} 
