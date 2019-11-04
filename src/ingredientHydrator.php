<?php

namespace GRUB;

class IngredientHydrator {
    /**
     * @var array of instantiated ingredient entity objects
     */
    public $results;

    /**
     * IngredientHydrator constructor.
     *
     * @param Db $db
     *
     * @result populates results property with ingredients' names
     */
    public function __construct(GRUB\Db $db)
    {
        $query = $db->prepare("SELECT `name` FROM `ingredients`;");
        $query->setFetchMode(PDO::FETCH_CLASS, 'IngredientEntity');
        $query->execute();
        $this->results = $query->fetchAll();
    }

    /**
     * Instantiates ingredient entity objects
     *
     * @param array $results
     *
     * @return array of ingredient entity objects
     */
    public function getIngredients(array $results) :array {
        $ingredients = [];
        foreach ($results as $result) {
            $ingredient = new GRUB\IngredientEntity($result['name']);
            array_push($ingredients, $ingredient);
        }
        return $ingredients;
    }
}
