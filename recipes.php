<?php

/**
 * Function to validate post data from form submitted from index.php
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
