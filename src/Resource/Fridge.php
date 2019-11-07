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
     * @param array $recipe the recipe to be saved by the user
     *
     * @return bool whether the db query was successful
     */
    public function saveRecipe(array $recipe): bool
    {
        $statement = "INSERT INTO `recipes` (`title`, `link`, `imageURL`, `ingredients`) VALUES (:title, :link, :imageURL, :ingredients)";
        $query = $this->db->prepare($statement);
        $query->bindParam(":title", $recipe['title']);
        $query->bindParam(":link", $recipe['link']);
        $query->bindParam(":imageURL", $recipe['imageURL']);
        $query->bindParam(":ingredients", $recipe['ingredients']);
        return $query->execute();
    }
    /**
     * @param array $recipe the recipe to be delete by the user
     *
     * @return bool whether the db query was successful
     */
    public function deleteRecipe(array $recipe): bool
    {
        $statement = "DELETE FROM `recipes` (`title`, `link`, `imageURL`, `ingredients`) WHERE (?, ?, ?, ?)";
        $query = $this->db->prepare($statement);
        return $query->execute([$recipe['title'], $recipe['link'], $recipe['imageURL'], $recipe['ingredients']]);
    }
}