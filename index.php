<?php

require_once "vendor/autoload.php";

$ingredientHydrator = new GRUB\IngredientHydrator(GRUB\Db::getDB());
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
    </head>
    <body>
        <div class="container">
            <h1>GRUB</h1>
            <div>
                <h6>Please select the ingredients you would like to use</h6>
            </div>
            <form method="post" action="recipes.php">
                <?php echo $ingredientForm; ?>
                <h6>Extra ingredients (single words separated by spaces): </h6>
                <input class= "extras" type="text" name="userIngredients"/>
                <input class = "submit" type="submit">
            </form>
        </div>
    </body>
</html>


