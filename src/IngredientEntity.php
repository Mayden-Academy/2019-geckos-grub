<?php

namespace GRUB; 

/* Class for IngredientEntities */
class IngredientEntity {
    private $name;
    
    /**
     * Constructor for IngredientEntity
     *
     * @param string $name Name for ingredient object
     */
    public function __construct(string $name){

        $this->name = $name;
    }

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
        $html .= "<input type='checkbox' name='".$this->getName()."'/>";
        $html .= "<p>".$this->getName()."</p>";
        $html .= "</div>";
        return $html;
    }
}