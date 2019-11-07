<?php
session_start();
require_once "vendor/autoload.php";

use GRUB\Resource\Curl;
use GRUB\Recipe\RecipeHydrator;
use GRUB\Validator\Validator;

$message = "";

if($_POST != []) {
    $_SESSION['ingredients'] = $_POST;
    $htmlOut = '';
    $formDataHandler = new GRUB\Resource\FormDataHandler();
    $ingredients = $formDataHandler->processData($_POST);
    $request = new Curl($ingredients);
    $recipeHydrator = new RecipeHydrator($request);
    $recipes = $recipeHydrator->getRecipes();
    if(count($recipes) != 0) {
        foreach($recipes as $recipe) {
            $htmlOut .=  $recipe->generateHTML();
        }
    } else {
        $htmlOut =  "<h1>No recipes found, please select different ingredients</h1>";
    }
} else {
    /* Grabs session ingredients if present
    * so that
    */
    if(isset($_SESSION['ingredients'])) {
        $htmlOut = '';
        $formDataHandler = new GRUB\Resource\FormDataHandler();
        $ingredients = $formDataHandler->processData($_SESSION['ingredients']);
        $request = new Curl($ingredients);
        $recipeHydrator = new RecipeHydrator($request);
        $recipes = $recipeHydrator->getRecipes();
        if(count($recipes) != 0) {
            foreach($recipes as $recipe) {
                $htmlOut .=  $recipe->generateHTML();
            }
        } else {
            $htmlOut =  "<h1>No recipes found, please select different ingredients</h1>";
        }
    } else {
        header("Location: index.php?message=Please%20select%20some%20ingredients");
    }
}

if(isset($_GET['message'])) {
    $message = $_GET['message'];
}

?>

<html lang="en-GB">
    <head>
        <title>GRUB</title>
        <link rel="stylesheet" type="text/css" href="styles.css"/>
    </head>
    <body>
        <div class="container">
            <h1>GRUB</h1>
            <?php 
            if($message != "") {
                echo "<h5>Recipe '$message' saved!</h5>";
            } 
             ?>
            <a href='savedRecipes.php'><button>View Saved Recipes</button></a>
            <a href='index.php'><button>Back</button></a>
            <br>
                <?php echo $htmlOut; ?>    
        </div>
    </body>
</html>
