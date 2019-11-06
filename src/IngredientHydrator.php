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
     * Property for holding a database object
     *
     * @var PDO Database Object
     */
    private $db;

    /**
     * IngredientHydrator constructor.
     *
     * @param Db $db
     *
     * @result populates results property with ingredients' names
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Instantiates ingredient entity objects
     *
     *
     * @return array of ingredient entity objects
     */
    public function getIngredients() {
        $query = $this->db->prepare("SELECT `name` FROM `ingredients`;");
        $query->setFetchMode(\PDO::FETCH_CLASS, 'GRUB\IngredientEntity');
        $query->execute();
        return $query->fetchAll();
    }
}
