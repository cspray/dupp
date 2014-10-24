<?php

/**
 * 
 * @license See LICENSE in source root
 * @version 1.0
 * @since   1.0
 */

namespace Dupp;

use PHPUnit_Extensions_Database_DataSet_DefaultTableMetaData as DbUnitTableMetaData;
use PHPUnit_Extensions_Database_DataSet_DefaultTable as DbUnitTable;
use PHPUnit_Extensions_Database_DataSet_DefaultTableIterator as DbUnitTableIterator;
use InvalidArgumentException;

class ArrayDataSet {

    /**
     * @var array
     */
    protected $tables = [];

    /**
     * @param array $data
     */
    public function __construct(array $data) {
        foreach ($data as $tableName => $rows) {
            $columns = [];
            if (isset($rows[0])) {
                $columns = array_keys($rows[0]);
            }

            $metaData = new DbUnitTableMetaData($tableName, $columns);
            $table = new DbUnitTable($metaData);

            foreach ($rows as $row) {
                $table->addRow($row);
            }
            $this->tables[$tableName] = $table;
        }
    }

    protected function createIterator($reverse = false) {
        return new DbUnitTableIterator($this->tables, $reverse);
    }

    public function getTable($tableName) {
        if (!isset($this->tables[$tableName])) {
            throw new InvalidArgumentException("$tableName is not a table in the current database.");
        }

        return $this->tables[$tableName];
    }


} 
