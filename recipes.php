<?php

require_once("vendor/autoload.php");

use GRUB\Curl;
use GRUB\RecipeHydrator;
use GRUB\Validator;

if($_POST != []) {
    $htmlOut = '';
    $ingredients = Validator::validateForm($_POST);
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

?>

<html lang="en-GB">
    <head>
        <title>GRUB</title>
        <link rel="stylesheet" type="text/css" href="styles.css"/>
    </head>
    <body>
        <div class="container">
            <h1>GRUB</h1>
                <?php echo $htmlOut; ?>    
        </div>
    </body>
</html>
