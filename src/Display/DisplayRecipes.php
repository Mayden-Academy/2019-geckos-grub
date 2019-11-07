<?php

namespace GRUB\Display;
use GRUB\Resource\Curl;
use GRUB\Ingredient\FormDataHandler as FormDataHandler;
use GRUB\Recipe\RecipeHydrator as RecipeHydrator;

/**
 * Class for generating recipe HTML from API data
 */
abstract class DisplayRecipes 
{
    /**
     * Generates HTML for recipes from API
     *
     * @param array $dataSource Formdata from ingredients selection page
     * @return string HTML for recipes 
     */
    public static function generateRecipeHTML(array $dataSource): string
    {
    $htmlOut = '';
    $formDataHandler = new FormDataHandler();
    $ingredients = $formDataHandler->processData($dataSource);
    $request = new Curl($ingredients);
    $recipeHydrator = new RecipeHydrator($request);
    $recipes = $recipeHydrator->getRecipes();
    if(count($recipes) != 0) {
        foreach($recipes as $recipe) {
            $htmlOut .=  $recipe->generateHTML();
        }
    } else {
        $htmlOut =  "<h1>No recipes found, please select different ingredients</h1>";
    }

    return $htmlOut;
    }
}