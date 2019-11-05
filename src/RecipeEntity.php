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
     *
     * @param string $link Link to the recipe 
     *
     * @param string $imageURL URL of an image of the dish
     *
     * @param array $ingredients Array of the ingredients required for the recipe
     */
    public function __construct(string $title, string $link, string $imageURL, string $ingredients){
              $this->title = $title;
              $this->link = $link;
              $this->imageURL = $imageURL;
              $this->ingredients = $ingredients;

            if(strlen($imageURL) == 0) {
                $this->imageURL = "img/can.jpg";
            }
    }

    /**
     * Generating HTML from recipe properties.
     *
     * @return string HTML code. 
     */
    public function generateHTML(): string {
        $html = "<div class='recipe'>";
        $html .= "<div class='left'>";
        $html .= "<div class='recipeImage'>";
        $html .= "<img src='$this->imageURL'/>";
        $html .= "</div>";
        $html .= "<a href='$this->link'><button>Link to recipe</button></a>";
        $html .= "</div>";
        $html .= "<div class='right'>";
        $html .= "<h5>$this->title</h5>";
        $html .= "<p>Ingredients: $this->ingredients </p>";
        $html .= "</div>";
        $html .= "</div>";
        return $html;
    }
}