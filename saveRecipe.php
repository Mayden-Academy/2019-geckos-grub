<?php

require_once "vendor/autoload.php";

use GRUB\Resource\Fridge;
use GRUB\Resource\Db;


/**
 * Catches save button form request from recipes.php
 * Redirects to recipes.php after saving recipe
 * to database. Redirects with get containing message
 * with saved recipe title to be displayed on the recipes page
 */
if($_POST !=[]){
    $message = $_POST['title'];
    $thefridge = new Fridge(Db::getDB());
    $thefridge->saveRecipe($_POST);
    header("Location: recipes.php?message=$message");
}