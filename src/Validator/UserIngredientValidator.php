<?php

namespace GRUB\Validator;

/**
 * Class UserIngredientValidator class with a static function used for validation of user-inputted ingredients
 * 
 * @packages GRUB
 */
abstract class UserIngredientValidator {
    /**
	* Function to validate ingredients input by user and return a 'clean' array of ingredients with whitespace removed
	*
	* @param array $explodedUserIngredients an array of the user ingredients submitted from index.php
	*
	* @return array of validated user-inputted ingredients
	*/
	public static function validateUserIngredients(array $explodedUserIngredients) {
	  $validatedIngredients = [];
		if ($explodedUserIngredients != []){
			foreach ($explodedUserIngredients as $ingredient){
				//removes anything that isn't a letter and removes all whitespace
				//the letter i at the end is used to remove case sensitivity from the regex
				$validatedIngredient = preg_replace( '/[^a-z]/i', '', $ingredient);
				array_push($validatedIngredients, $validatedIngredient);
			}
			return $validatedIngredients;
		} else {
			return "<p>Invalid data. Please try again.</p>";
		}
	}
}
