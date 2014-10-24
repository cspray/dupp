<?php

/**
 * 
 * @license See LICENSE in source root
 * @version 1.0
 * @since   1.0
 */

namespace Dupp;

class DatabaseCredentials {

    private $schema;
    private $dsn;
    private $user;
    private $password;

    function __construct($schema, $dsn, $user, $password) {
        $this->schema = $schema;
        $this->dsn = $dsn;
        $this->user = $user;
        $this->password = $password;
    }

    function getSchema() {
        return $this->schema;
    }

    function getDsn() {
        return $this->dsn;
    }

    function getUser() {
        return $this->user;
    }

    function getPassword() {
        return $this->password;
    }

} 
