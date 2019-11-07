<?php

require_once "vendor/autoload.php";

$ingredientHydrator = new GRUB\Ingredient\IngredientHydrator(GRUB\Resource\Db::getDB());
$ingredients = $ingredientHydrator->getIngredients();
$ingredientForm = "";

foreach($ingredients as $ingredient) {
    $ingredientForm .= $ingredient->generateHTML();
}


if(isset($_GET['message'])) {
    echo $_GET['message'];
}

?>

<html lang="en-GB">
    <head>
        <title>GRUB</title>
        <link rel="stylesheet" type="text/css" href="styles.css"/>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <h1>GRUB</h1>
            <a href='savedRecipes.php'><button>View Saved Recipes</button></a>
            <div>
                <h6>Please select the ingredients you would like to use</h6>
            </div>
            <form method="post" action="recipes.php">
                <?php echo $ingredientForm; ?>
                <h6>Extra ingredients (separated by spaces): </h6>
                <input class="extras" type="text" name="userIngredients" placeholder="marmite apple spinach beetroot" />
                <input class="submit" type="submit">
            </form>
        </div>
    </body>
</html>


