<?php

namespace GRUB;

/*
* Abstract class with a static function used for form validation
*/
abstract class Validator {

    /**
 * Function to validate post data from form submitted from index.php
 *
 * @param array $formData data from a form
 * 
 * @return array of validated ingredients
 */
public static function validateForm(array $formData) :array {
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
}