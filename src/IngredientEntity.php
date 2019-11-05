<?php

namespace GRUB;

/**
 * Class IngredientEntities uses ingredients object from IngredientsHydrator to output a list of ingredients with checkboxes to the front end
 *
 * @package GRUB
 */
class IngredientEntity {

    /**
     * @var containing ingredient names
     */
    private $name;

    /**
     * Returns name of ingredient object as string
     *
     * @return string Name of ingredient
     */
    public function getName(): string{
        return $this->name;
    }

    /**
     * Generates HTML form checkbox for ingredient
     *
     * @return string HTML string
     */
    public function generateHTML(): string{
        $html = "<div class='ingredient'>";
        $html .= "<label><input type='checkbox' name='".$this->getName()."'/>";
        $html .= "".$this->getName()."</label>";
        $html .= "</div>";
        return $html;
    }
}