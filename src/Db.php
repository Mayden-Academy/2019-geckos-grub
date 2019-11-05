<?php

namespace GRUB;

use PDO;

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
    public function getDB() : PDO
    {
        return new PDO('mysql:host=db; dbname=ingredients', 'root', 'password');
    }

}

