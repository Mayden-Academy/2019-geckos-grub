<?php

require_once "vendor/autoload.php";

use GRUB\Recipe\RecipeDBHydrator;

$message = "";

$htmlOut = "";
$recipeDBHydrator = new RecipeDBHydrator(GRUB\Resource\Db::getDB());
$recipes = $recipeDBHydrator->getRecipesFromDB();
if(count($recipes) != 0) {
foreach($recipes as $recipe) {
$htmlOut .=  $recipe->generateHTMLSaved();
}
} else {
$htmlOut =  "<h3>You have no recipes saved</h3>";
}
if($_POST !=[]){
    $message = $_POST['title'];
    $thefridge =new GRUB\Resource\Fridge(GRUB\Resource\Db::getDB());
    $thefridge->deleteRecipe($_POST);
    header("Location: savedRecipes.php?message=$message");
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
                echo "<h5>Recipe '$message' deleted</h5>";
            } 
             ?>
            <a href='index.php'><button>Back</button></a>
            <br>
                <?php echo $htmlOut; ?>
        </div>
    </body>
</html>
