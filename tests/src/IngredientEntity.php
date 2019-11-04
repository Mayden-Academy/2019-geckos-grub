<?php

use GRUB\IngredientEntity;
use PHPUnit\Framework\TestCase;

require_once('../../src/IngredientEntity.php');

class IngredientEntityTest extends TestCase 
{
    public function testConstructorGetNameSuccess()
    {
        $ingredient = new IngredientEntity('carrot');
        $expected = 'carrot';
        $result = $ingredient->getName();
        $this->assertEquals($result, $expected);
    }

    public function testConstructorGetNameFailure() {
        $ingredient = new IngredientEntity(9);
        $expected = '9';
        $result = $ingredient->getName();
        $this->assertEquals($result, $expected);
    }

    public function testConstructorGetNameMalformed()
    {
        
        $this->expectException(TypeError::class);
        $case = new IngredientEntity(['carrrot']);
    }

    public function testGenerateHTMLSuccess() 
    {
        $ingredient = new IngredientEntity('carrot');
        $result = $ingredient->generateHTML();
        $expected = "<div class='ingredient'>";
        $expected .= "<input type='checkbox' name='carrot'/>";
        $expected .= "<p>carrot</p>";
        $expected .= "</div>";
        $this->assertEquals($result, $expected);
    }
    public function testGenerateHTMLFailure() 
    {
        $ingredient = new IngredientEntity(9);
        $result = $ingredient->generateHTML();
        $expected = "<div class='ingredient'>";
        $expected .= "<input type='checkbox' name='9'/>";
        $expected .= "<p>9</p>";
        $expected .= "</div>";
        $this->assertEquals($result, $expected);
    }
    

}