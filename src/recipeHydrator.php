<?php
namespace GRUB;
class RecipeHydrator
{
    private $recipes=[];
    private $recipesArray;

    /**
     * RecipeHydrator constructor.
     * @param GRUB\Curl $curl takes a multiple array from Curl
     */
    public function __construct(GRUB\Curl $curl){
      $this->recipesArray=$curl->makeRequest()['results'];
  }

    /**
     * @return array pass a array of objects(recipes) with all the information from the Curl
     */
    public function getRecipe():array {
        foreach($this->recipesArray as $recipe){
            $recipe= new GRUB\RecipeEntity($recipe['title'],$recipe['href'],$recipe['thumbnail'],$recipe['ingredients'];
            array_push($this->recipes,$recipe);
        }
        return $this->recipes;
    }
}