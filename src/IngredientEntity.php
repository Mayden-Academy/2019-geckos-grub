<?php

namespace GRUB; 

class IngredientEntity {
    private $name;
    
    public function __construct(string $name){

        $this->name = $name;
    }

    public function getName(): string{
        return $this->name;
    }

    public function generateHTML(): string{
        $html = "<div class='ingredient'>";
        $html .= "<input type='checkbox' name=".$this->getName()."/>";
        $html .= "<p>".$this->getName()."</p>";
        $html .= "</div>";
        return $html;
    }
}