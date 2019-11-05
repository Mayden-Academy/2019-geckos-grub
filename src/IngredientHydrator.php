<?php

namespace GRUB;

/**
 * Class IngredientHydrator uses Db connection to fetch ingredients array from db
 *
 * @package GRUB
 */
class IngredientHydrator {
    /**
     * @var array of instantiated ingredient entity objects
     */
    public $ingredients;

    /**
     * IngredientHydrator constructor.
     *
     * @param Db $db
     *
     * @result populates results property with ingredients' names
     */
    public function __construct(\PDO $db)
    {
        $query = $db->prepare("SELECT `name` FROM `ingredients`;");
        $query->setFetchMode(\PDO::FETCH_CLASS, 'GRUB\IngredientEntity');
        $query->execute();
        $this->ingredients = $query->fetchAll();
    }

    /**
     * Instantiates ingredient entity objects
     *
     *
     * @return array of ingredient entity objects
     */
    public function getIngredients() {
$query = $db->prepare("SELECT `name` FROM `ingredients`;");
        $query->setFetchMode(\PDO::FETCH_CLASS, 'GRUB\IngredientEntity');
        $query->execute();
        return $query->fetchAll();
    }
}
