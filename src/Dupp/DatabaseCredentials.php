<?php

/**
 * 
 * @license See LICENSE in source root
 * @version 1.0
 * @since   1.0
 */

namespace Dupp;

class DatabaseCredentials {

    private $dsn;
    private $user;
    private $password;

    function __construct($dsn, $user, $password) {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->password = $password;
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
