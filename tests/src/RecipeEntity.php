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
        $testIngredient = new GRUB\RecipeEntity ('string','string','string',['string']);
        $result = $testIngredient->generateHTML();
        $expected = "";
        $expected .= "<div class='recipe'>";
        $expected .= "<a href='string'>";
        $expected .= "<h3>string</h3>";
        $expected .= "<div class='recipeImage'>";
        $expected .= "<img src='string'/>";
        $expected .= "</div>";
        $expected .= "<p>Ingredients: string  </p>";
        $expected .= "</a>";
        $expected .= "</div>";
        $this->assertEquals($expected, $result);
    }
    /**
     * Testing for failure in generating HTML. Passed inergers as opposed to strings.
     *
     * @return void
     */
    public function testFailureRecipeEntityGenerateHTML(){
        $testIngredient = new GRUB\RecipeEntity (9,9,9,[9]);
        $result = $testIngredient->generateHTML();
        $expected = "";
        $expected .= "<div class='recipe'>";
        $expected .= "<a href='9'>";
        $expected .= "<h3>9</h3>";
        $expected .= "<div class='recipeImage'>";
        $expected .= "<img src='9'/>";
        $expected .= "</div>";
        $expected .= "<p>Ingredients: 9  </p>";
        $expected .= "</a>";
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
        $case = new GRUB\RecipeEntity ([],[],[],9);
    }
}