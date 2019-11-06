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
        $statement = "INSERT INTO `recipes` (`title`, `imageURL`, `link`, `ingredients`) VALUES (?, ?, ?, ?)";
        $query = $this->db->prepare($statement);
        return $query->execute([$recipe['title'], $recipe['imageURL'], $recipe['link'], $recipe['ingredients']]);
    }
}