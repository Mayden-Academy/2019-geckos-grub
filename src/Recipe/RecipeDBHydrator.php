<?php

namespace GRUB\Recipe;
use PDO;

class RecipeDBHydrator {

    private $recipes;
    private $db;

    public function __construct(PDO $db) 
    {
        $this->$db  = $db;    
    }

    public function getRecipesFromDB() 
    {
        $statement = "SELECT `title`,`link`,`imageURL`,`ingredients` FROM `recipes`;";
        $query = $this->db->prepare($statement);
        $query->setFetchMode(PDO::FETCH_CLASS, 'GRUB\Recipe\RecipeEntity');
        $query->execute();
    }

}