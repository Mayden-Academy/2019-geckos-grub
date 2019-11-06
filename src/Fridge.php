<?php

namespace GRUB\Resource;

class Fridge {

    /**
     * @var \PDO database connection
     */
    private $db;

    /**
     * Fridge constructor.
     * @param \PDO $db database connection
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param array $recipe
     * @return bool
     */
    public function saveRecipe(array $recipe)
    {
        $statement = "INSERT INTO `recipes` (`title`, `link`, `imageURL`, `ingredients`) VALUES (?, ?, ?, ?)";
        $query = $this->db->prepare($statement);
        return $query->execute([$recipe['title'], $recipe['link'], $recipe['imageURL'], $recipe['ingredients']]);
    }
}