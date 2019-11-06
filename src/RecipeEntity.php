<?php

namespace GRUB\recipe;

/**
 * Class for a recipe object
 */
class RecipeEntity {
    
    /**
     * Recipe title
     *
     * @var string Recipe title
     */
    private $title = "";
    
    /**
     * Recipe URL
     *
     * @var string Recipe URL
     */
    private $link = "";
    
    /**
     * Recipe Image
     *
     * @var string Recipe Image
     */
    private $imageURL = "";
    
    /**
     * Recipe ingredients
     *
     * @var string Recipe ingredients
     */
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
     * @param string $ingredients Array of the ingredients required for the recipe
     */
    public function __construct(string $title, string $link, string $imageURL, string $ingredients){
              $this->title = html_entity_decode($title);
              $this->link = $link;

            if(strlen($imageURL) == 0) {
                $this->imageURL = "img/can.jpg";
            } else {
                $this->imageURL = $imageURL;
            }

            $this->ingredients = $this->limit_ingredients($ingredients);
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

    /**
     * Generating HTML from recipe properties with delete button for saved recipes.
     *
     * @return string HTML code.
     */
    public function generateHTMLForSavedRecipes(): string {
        $html = "<div class='recipe'>";
        $html .= "<div class='left'>";
        $html .= "<div class='recipeImage'>";
        $html .= "<img src='$this->imageURL'/>";
        $html .= "</div>";
        $html .= "<a name='deleteRecipe'><button>Delete Recipe</button></a>";
        $html .= "<a href='$this->link'><button>Link to recipe</button></a>";
        $html .= "</div>";
        $html .= "<div class='right'>";
        $html .= "<h5>$this->title</h5>";
        $html .= "<p>Ingredients: $this->ingredients </p>";
        $html .= "</div>";
        $html .= "</div>";
        return $html;
    }

    /**
     * Limits the number of ingredients to 21
     *
     * @param [string] $phrase The string of ingredients to be trimmed
     * @return string Number of ingredients limited to 21
     */
    private function limit_ingredients(string $phrase) :string {
        $phrase_array = explode(', ',$phrase);
        if(count($phrase_array) > 21) {
            $phrase = implode(', ', array_slice($phrase_array, 0, 21)) . '...';
        }
        return $phrase;
     }
}