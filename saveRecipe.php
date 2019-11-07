<?php

require_once "vendor/autoload.php";

use GRUB\Resource\Fridge;
use GRUB\Resource\Db;


/**
 * Catches save button form request from recipes.php
 * Redirects to 
 * 
 */
if($_POST !=[]){
    $message = $_POST['title'];
    $thefridge = new Fridge(Db::getDB());
    $thefridge->saveRecipe($_POST);
    header("Location: recipes.php?message=$message");
}