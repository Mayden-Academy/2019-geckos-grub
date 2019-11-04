<?php

namespace GRUB;

/**
 * Class Db
 *
 * @return db connection
 */
class Db {
    /**
     * Creates a database connection
     *
     * @return PDO
     */
    public function getDB() : \PDO
    {
        $db = new \PDO('mysql:host=db; dbname=ingredients', 'root', 'password');
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        return $db;
    }

    /**
     * Db constructor.
     */
    public function __construct()
    {
        return $this->getDB();
    }
}

