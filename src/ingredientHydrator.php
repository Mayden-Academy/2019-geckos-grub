<?php

namespace GRUB;


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
     * @param array $results
     *
     * @return array of ingredient entity objects
     */
    public function getIngredients() {
        return $this->ingredients;
    }
}
