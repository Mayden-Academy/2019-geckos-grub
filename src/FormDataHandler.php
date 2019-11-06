<?php
namespace GRUB;

class FormDataHandler
{
    private $ingredientsArray=[];
  function processData($formData){
       foreach($formData as $key=>$value){
           if($key = 'userIngredients'){
               $userIngredients = explode (' ',$value);
               $userIngredients= GRUB\UserIngredientValidator::validateUserIngredients($userIngredients);
               $this->ingredientsArray=array_merge($this->ingredientsArray, $userIngredients);
           }else{
               $ingredient = Validator::validateIngredient($key);
               array_push($this->ingredientsArray, $ingredient);
           }
       }
       return $this->ingredientsArray;
   }
}