<?php

require '../../src/RecipeEntity.php'; // Links to another php file, needed when testing

use PHPUnit\Framework\TestCase;

class StackTest extends TestCase {
    /**
     * Testing for success with generating HTML
     *
     * @return void
     */
	public function testSuccessRecipeEntityGenerateHTML(){
        $testIngredient = new GRUB\RecipeEntity ('string','string','string','string');
        $result = $testIngredient->generateHTML();
        $expected = "<div class='recipe'>";
        $expected .= "<div class='left'>";
        $expected .= "<div class='recipeImage'>";
        $expected .= "<img src='string'/>";
        $expected .= "</div>";
        $expected .= "<a href='string'>";
        $expected .= "<button>Link to recipe</button>";
        $expected .= "</a>";
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
    public function testFailureRecipeEntityGenerateHTML(){
        $testIngredient = new GRUB\RecipeEntity (9,9,9,9);
        $result = $testIngredient->generateHTML();
        $expected = "<div class='recipe'>";
        $expected .= "<div class='left'>";
        $expected .= "<div class='recipeImage'>";
        $expected .= "<img src='9'/>";
        $expected .= "</div>";
        $expected .= "<a href='9'>";
        $expected .= "<button>Link to recipe</button>";
        $expected .= "</a>";
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
    public function testMalformedRecipeEntityGenerateHTML(){
        $this->expectException(TypeError::class);
        $case = new GRUB\RecipeEntity ([],[],[],[]);
    }
}