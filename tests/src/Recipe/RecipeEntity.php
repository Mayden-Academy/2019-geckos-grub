<?php

require '../../../src/Recipe/RecipeEntity.php'; // Links to another php file, needed when testing

use PHPUnit\Framework\TestCase;

class StackTest extends TestCase {

    /**
     * Testing for success with generating HTML
     *
     * @return void
     */
	public function testSuccessRecipeEntityGenerateHTML()
    {
        $testIngredient = new GRUB\Recipe\RecipeEntity ('string','string','string','string');
        $result = $testIngredient->generateHTML();
        $expected = "<div class='recipe'>";
        $expected .= "<div class='left'>";
        $expected .= "<div class='recipeImage'>";
        $expected .= "<img src='string'/>";
        $expected .= "</div>";
        $expected .= "<form class='recipeForm'>";
        $expected .= "<input class='hidden' type='text' name='title' value='string'>";
        $expected .= "<input class='hidden' type='text' name='ingredients' value='string'>";
        $expected .= "<input class='hidden' type='text' name='imageURL' value='string'>";
        $expected .= "<input class='hidden' type='text' name='link' value='$this->link'>";
        $expected .= "<button type='submit' name='saveButton'>Save Recipe</button>";
        $expected .= "</form>";
        $expected .= "<div class='recipeButton'>";
        $expected .= "<a href='string'><button>Link to Recipe</button></a>";
        $expected .= "</div>";
        $expected .= "</div>";
        $expected .= "<div class='right'>";
        $expected .= "<h5>string</h5>";
        $expected .= "<p>Ingredients: string </p>";
        $expected .= "</div>";
        $expected .= "</div>";
        $this->assertEquals($expected, $result);
    }

    /**
     * Testing for failure in generating HTML. Passed inergers as opposed to strings.
     *
     * @return void
     */
    public function testFailureRecipeEntityGenerateHTML()
    {
        $testIngredient = new GRUB\Recipe\RecipeEntity (9,9,9,9);
        $result = $testIngredient->generateHTML();
        $expected = "<div class='recipe'>";
        $expected .= "<div class='left'>";
        $expected .= "<div class='recipeImage'>";
        $expected .= "<img src='9'/>";
        $expected .= "</div>";
        $expected .= "<form class='recipeForm'>";
        $expected .= "<input class='hidden' type='text' name='title' value='9'>";
        $expected .= "<input class='hidden' type='text' name='ingredients' value='9'>";
        $expected .= "<input class='hidden' type='text' name='imageURL' value='9'>";
        $expected .= "<input class='hidden' type='text' name='link' value='9'>";
        $expected .= "<button type='submit' name='saveButton'>Save Recipe</button>";
        $expected .= "</form>";
        $expected .= "<div class='recipeButton'>";
        $expected .= "<a href='9'>";
        $expected .= "<button>Link to Recipe</button>";
        $expected .= "</a>";
        $expected .= "</div>";
        $expected .= "</div>";
        $expected .= "<div class='right'>";
        $expected .= "<h5>9</h5>";
        $expected .= "<p>Ingredients: 9 </p>";
        $expected .= "</div>";
        $expected .= "</div>";
        $this->assertEquals($expected, $result);
    }

    /**
     * Testing for malformed code. Passed in arrays not strings.
     *
     * @return void
     */
    public function testMalformedRecipeEntityGenerateHTML()
    {
        $this->expectException(TypeError::class);
        $case = new GRUB\Recipe\RecipeEntity ([], [], [], []);
    }

    /**
     * Testing for success with generating HTML
     *
     * @return void
     */
    public function testSuccessRecipeEntityGenerateHTMLSaved(){
        $testIngredient = new GRUB\Recipe\RecipeEntity ('string','string','string','string');
        $result = $testIngredient->GenerateHTMLSaved();
        $expected = "<div class='recipe'>";
        $expected .= "<div class='left'>";
        $expected .= "<div class='recipeImage'>";
        $expected .= "<img src='string'/>";
        $expected .= "</div>";
        $expected .= "<form class='recipeForm'>";
        $expected .= "<input class='hidden' type='text' name='title' value='string'>";
        $expected .= "<input class='hidden' type='text' name='ingredients' value='string'>";
        $expected .= "<input class='hidden' type='text' name='imageURL' value='string'>";
        $expected .= "<input class='hidden' type='text' name='link' value='$this->link'>";
        $expected .= "<button type='submit' name='deleteButton'>Delete Recipe</button>";
        $expected .= "</form>";
        $expected .= "<div class='recipeButton'>";
        $expected .= "<a href='string'><button>Link to Recipe</button></a>";
        $expected .= "</div>";
        $expected .= "</div>";
        $expected .= "<div class='right'>";
        $expected .= "<h5>string</h5>";
        $expected .= "<p>Ingredients: string </p>";
        $expected .= "</div>";
        $expected .= "</div>";
        $this->assertEquals($expected, $result);
    }
    /**
     * Testing for failure in generating HTML. Passed inergers as opposed to strings.
     *
     * @return void
     */
    public function testFailureRecipeEntityGenerateHTMLSaved(){
        $testIngredient = new GRUB\Recipe\RecipeEntity (9,9,9,9);
        $result = $testIngredient->GenerateHTMLSaved();
        $expected = "<div class='recipe'>";
        $expected .= "<div class='left'>";
        $expected .= "<div class='recipeImage'>";
        $expected .= "<img src='9'/>";
        $expected .= "</div>";
        $expected .= "<form class='recipeForm'>";
        $expected .= "<input class='hidden' type='text' name='title' value='9'>";
        $expected .= "<input class='hidden' type='text' name='ingredients' value='9'>";
        $expected .= "<input class='hidden' type='text' name='imageURL' value='9'>";
        $html .= "<input class='hidden' type='text' name='link' value='$this->link'>";
        $expected .= "<button type='submit' name='deleteButton'>Delete Recipe</button>";
        $expected .= "</form>";
        $expected .= "<div class='recipeButton'>";
        $expected .= "<a href='9'><button>Link to Recipe</button></a>";
        $expected .= "</div>";
        $expected .= "</div>";
        $expected .= "<div class='right'>";
        $expected .= "<h5>9</h5>";
        $expected .= "<p>Ingredients: 9 </p>";
        $expected .= "</div>";
        $expected .= "</div>";
        $this->assertEquals($expected, $result);
    }
    /**
     * Testing for malformed code. Passed in arrays not strings.
     *
     * @return void
     */
    public function testMalformedRecipeEntityGenerateHTMLSaved(){
        $this->expectException(TypeError::class);
        $case = new GRUB\Recipe\RecipeEntity ([],[],[],[]);
    }
}
