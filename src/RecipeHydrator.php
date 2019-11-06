<?php
namespace GRUB;

/**
 * @class Takes the output from the Curl class and outputs a array with all the information
 */
class RecipeHydrator
{
    /**
     * @var array of recipe objects
     */
    private $recipes = [];

    /**
     * @var multidimensional array
     */
    private $recipesArray;

    /**
     * RecipeHydrator constructor.
     * @param GRUB\Curl $curl takes a multidimensional array from Curl
     */
    public function __construct(Curl $curl)
    {
      $this->recipesArray = $curl->makeRequest()['results'];
    }

    /**
     * @return array pass a array of objects(recipes) with all the information from the Curl
     */
    public function getRecipes():array
    {
        foreach($this->recipesArray as $recipe){
            $recipe = new RecipeEntity($recipe['title'], $recipe['href'], $recipe['thumbnail'], $recipe['ingredients']);
            array_push($this->recipes, $recipe);
        }
        return $this->recipes;
    }
}