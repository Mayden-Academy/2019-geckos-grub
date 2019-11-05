<?php

namespace GRUB;

class RecipeEntity {
    private $title = "";
    private $link = "";
    private $imageURL = "";
    private $ingredients = "";

    /**
     * Instanciates RecipeEntity
     *
     * @param string $title Title of the recipe
     * @param string $link Link to the recipe 
     * @param string $imageURL URL of an image of the dish
     * @param array $ingredients Array of the ingredients required for the recipe
     */
    public function __construct(string $title, string $link, string $imageURL, array $ingredients){
              $this->title = $title;
              $this->link = $link;
              $this->imageURL = $imageURL;
              $this->ingredients = $ingredients;
    }

    /**
     * Generating HTML from recipe properties.
     *
     * @return string HTML code. 
     */
    public function generateHTML(): string {
        $ingredients = "";

        foreach($this->ingredients as $ingredient) {
            $ingredients .= $ingredient .= " ";
        }
        
        $html = "<div class='recipe'>";
        $html .= "<a href='$this->link'>";
        $html .= "<h3>$this->title</h3>";
        $html .= "<div class='recipeImage'>";
        $html .= "<img src='$this->imageURL'/>";
        $html .= "</div>";
        $html .= "<p>Ingredients: $ingredients </p>";
        $html .= "</a>";
        $html .= "</div>";

        return $html;
    }
}