<?php

namespace GRUB\Recipe;
use PDO;
/**
 * Class to create recipe entities from DB
 */
class RecipeDBHydrator {
    /**
     * Property to store DB object
     *
     * @var PDO 
     */
    private $db;

    /**
     * Constructor that takes PDO object and stores in $db
     *
     * @param PDO $db
     */
    public function __construct(PDO $db) 
    {
        $this->$db  = $db;    
    }

    /**
     * Function that retrives the recipe objects from the DB
     *
     * @return array Array of recipe objects
     */
    public function getRecipesFromDB() : array
    {
        $statement = "SELECT `title`,`link`,`imageURL`,`ingredients` FROM `recipes`;";
        $query = $this->db->prepare($statement);
        $query->setFetchMode(PDO::FETCH_CLASS, 'GRUB\Recipe\RecipeEntity');
        $query->execute();
        return $query->fetchAll();
    }
}