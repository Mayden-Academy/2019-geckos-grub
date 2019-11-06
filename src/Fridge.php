<?php

namespace GRUB;

class Fridge {

    /**
     * @var \PDO database connection
     */
    private $db;

    /**
     * Fridge constructor.
     * @param \PDO $db
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
        $statement = "INSERT INTO `recipes` (`title`, `href`, `thumbnail`, `ingredients`) VALUES (?, ?, ?, ?)";
        $query = $this->db->prepare($statement);
        return $query->execute([$recipe['title'], $recipe['href'], $recipe['thumbnail'], $recipe['ingredients']]);
    }
}