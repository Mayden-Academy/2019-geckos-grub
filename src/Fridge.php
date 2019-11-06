<?php

namespace GRUB;

class Fridge {

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function saveRecipe(array $recipe)
    {
        $statement = "INSERT INTO `recipes` (`title`, `href`, `thumbnail`, `ingredients`) VALUES (?, ?, ?, ?)";
        $query = $this->db->prepare($statement);
        return $query->execute([$recipe['title'], $recipe['href'], $recipe['thumbnail'], $recipe['ingredients']]);
    }
}