<?php

namespace GRUB\Ingredient;

use GRUB\Validator\Validator;
use GRUB\Validator\UserIngredientValidator;

/**
 * @class FormDataHandler that provides method to process form data into an array
 */
class FormDataHandler
{
    /**
     * @var array Property to hold validate ingredients
     */
    private $ingredientsArray=[];

    /**
     * @param $formData post from the form
     * @return array of ingredients from the user, validated
     */
    public function processData(array $formData): array
    {
       foreach($formData as $key=>$value){
           if($key == 'userIngredients'){
               $userIngredients = explode (' ', $value);
               $userIngredients = UserIngredientValidator::validateUserIngredients($userIngredients);
               $this->ingredientsArray=array_merge($this->ingredientsArray, $userIngredients);
           } else {
               $ingredient = Validator::validateIngredient($key);
               array_push($this->ingredientsArray, $ingredient);
           }
       }
       return $this->ingredientsArray;
   }
}
