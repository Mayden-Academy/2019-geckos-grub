<?php

require_once "vendor/autoload.php";

$ingredientHydrator = new GRUB\IngredientHydrator();
$ingredients = $ingredientHydrator->getIngredients(GRUB\Db::getDB());
$ingredientForm = "";

foreach($ingredients as $ingredient) {
    $ingredientForm .= $ingredient->generateHTML();
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
                <input type="submit">
            </form>
        </div>
    </body>
</html>


