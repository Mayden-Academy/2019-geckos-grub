<?php

require_once "vendor/autoload.php";

use GRUB\Resource\Fridge;
use GRUB\Resource\Db;

if($_POST !=[]){
    $thefridge = new Fridge(Db::getDB());
    $thefridge->saveRecipe($_POST);
    header("Location: savedRecipes.php");
}