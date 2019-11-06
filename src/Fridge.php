<?php

namespace GRUB;

use PDO;

class Fridge {

    public $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function saveRecipe(array $recipe)
    {
        $statement = "INSERT INTO `recipes` (`name`, `cards`, `released`) VALUES (?, ?, ?)";
        $query = $db->prepare($statement);
        return $query->execute([$recipe['name'], $newSet['cards'], $newSet['released']]);


        $query = $this->db->prepare("SELECT `name` FROM `ingredients`;");
        $query->setFetchMode(\PDO::FETCH_CLASS, 'GRUB\IngredientEntity');
        $query->execute();
        return $query->fetchAll();
    }
}