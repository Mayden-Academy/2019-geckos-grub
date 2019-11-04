<?php

class Db {

    public function getDB()
    {
        $db = new PDO('mysql:host=db; dbname=ingredients', 'root', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    }

    public function __construct()
    {
        return $this->getDB();
    }
}