<?php

require_once "vendor/autoload.php";

use GRUB\Resource\Fridge;
use GRUB\Resource\Db;

if($_POST !=[]){
    $message = $_POST['title'];
    $thefridge = new Fridge(Db::getDB());
    $thefridge->saveRecipe($_POST);
    header("Location: recipes.php?message=$message");
}