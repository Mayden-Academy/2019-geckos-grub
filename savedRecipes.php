<?php

require_once "vendor/autoload.php";

use GRUB\Recipe\RecipeDBHydrator;

$htmlOut = "";
$recipeDBHydrator = new RecipeDBHydrator(GRUB\Resource\Db::getDB());
$recipes = $recipeDBHydrator->getRecipesFromDB();
if(count($recipes) != 0) {
foreach($recipes as $recipe) {
$htmlOut .=  $recipe->generateHTMLSaved();
}
} else {
$htmlOut =  "<h1>No recipes found, please select different ingredients</h1>";
}
if($_POST !=[]){
    $thefridge =new GRUB\Resource\Fridge(GRUB\Resource\Db::getDB());
    $thefridge->deleteRecipe($_POST);
    header("Location: savedRecipes.php");
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
            <a href='index.php'><button>Back</button></a>
            <br>
                <?php echo $htmlOut; ?>
        </div>
    </body>
</html>
