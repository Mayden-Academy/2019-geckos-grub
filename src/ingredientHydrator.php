<?php

namespace GRUB;

class IngredientHydrator {
    public $results;
    public function __construct(Db $db)
    {
        $query = $db->prepare("SELECT `name` FROM `ingredients`;");
        $query->setFetchMode(PDO::FETCH_CLASS, 'IngredientEntity');
        $query->execute();
        $this->results = $query->fetchAll();
    }

    public function getIngredients(array $results) :array {
        $ingredients = [];
        foreach ($results as $result) {
            $ingredient = new GRUB\IngredientEntity($result['name']);
            array_push($ingredients, $ingredient);
        }
        return $ingredients;
    }
}
