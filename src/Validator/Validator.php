<?php

namespace GRUB\Validator;

/*
* Abstract class with a static function used for form validation
*/
abstract class Validator {

    /**
 * Function to validate post data from form submitted from index.php
 *
 * @param string $ingredient
 * 
 * @return string validated ingredient
 */
    public static function validateIngredient(string $ingredient) :string
    {
        $ingredient = htmlentities($ingredient);
        return $ingredient;
    }
}