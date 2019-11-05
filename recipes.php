<?php

require_once("vendor/autoload.php");

use GRUB\Curl;
use GRUB\RecipeHydrator;

/**
 * Function to validate post data from form submitted from index.php
 *
 * @param array $formData data from a form
 * 
 * @return array of validated ingredients
 */
function validateForm(array $formData) :array {
    if ($formData != []){
        $ingredients = [];
        foreach ($formData as $ingredient => $state){
            $ingredient = htmlentities($ingredient);
            array_push($ingredients, $ingredient);
        }
        return $ingredients;
    } else {
       return 'Invalid data. Please try again.';
    }
}
if($_POST != []) {
    $ingredients = validateForm($_POST);
    $request = new Curl($ingredients);
    $recipeHydrator = new RecipeHydrator($request);
    $recipes = $recipeHydrator->getRecipes();
    if(count($recipes) != 0) {
        foreach($recipes as $recipe) {
            echo $recipe->generateHTML();
        }
    } else {
        echo "<h1>No recipes found, please select different ingredients</H1>";
    }
} else {
    header("Location: index.php?message=Please%20select%20some%20ingredients");
}