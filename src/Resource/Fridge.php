<?php

namespace GRUB\Resource;
use PDO;

/**
 * Class Fridge
 * @package GRUB\Resource holds methods for saving and deleting recipes
 */
class Fridge {

    /**
     * @var PDO database connection
     */
    private $db;

    /**
     * Fridge constructor.
     * @param \PDO $db database connection
     */
    public function __construct(PDO $db)
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
        // Query based on submitted URL

        $statement = "SELECT `link` FROM `recipes` WHERE `link` = :link ";
        $query = $this->db->prepare($statement);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->bindParam(":link", $recipe['link']);
        $query->execute();
        $existingRecipes = $query->fetchAll();

        // 'If' checking if there is an existing recipe with that URL

        if(count($existingRecipes) > 0) {
            $statement = "UPDATE `recipes` (`title`, `link`, `imageURL`, `ingredients`) VALUES (:title, :link, :imageURL, :ingredients) WHERE `link` = :link;";
            $query = $this->db->prepare($statement);
            $query->bindParam(":title", $recipe['title']);
            $query->bindParam(":link", $recipe['link']);
            $query->bindParam(":imageURL", $recipe['imageURL']);
            $query->bindParam(":ingredients", $recipe['ingredients']);
            return $query->execute();
        } else {
            $statement = "INSERT INTO `recipes` (`title`, `link`, `imageURL`, `ingredients`) VALUES (:title, :link, :imageURL, :ingredients)";
            $query = $this->db->prepare($statement);
            $query->bindParam(":title", $recipe['title']);
            $query->bindParam(":link", $recipe['link']);
            $query->bindParam(":imageURL", $recipe['imageURL']);
            $query->bindParam(":ingredients", $recipe['ingredients']);
            return $query->execute();
        }
    }
    /**
     * @param array $recipe the recipe to be delete by the user
     *
     * @return bool whether the db query was successful
     */
    public function deleteRecipe(array $recipe): bool
    {
        $statement = "DELETE FROM `recipes` WHERE `link` = :link";
        $query = $this->db->prepare($statement);
        $query->bindParam(":link", $recipe['link']);
        return $query->execute();
    }
}