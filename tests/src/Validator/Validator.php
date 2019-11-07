<?php

require_once('../../../src/Validator/Validator.php');

use PHPUnit\Framework\TestCase;

class RecipeTest extends TestCase
{
    /**
     * Tests for success of the validateForm function
     */
    public function testValidateFormSuccess()
    {
        $formData = "onions";
        $validation = GRUB\Validator\Validator::validateIngredient($formData);
        $expected = "onions";
        $this->assertEquals($validation, $expected);
    }

    /**
     * Tests for graceful failure of the validateForm function
     */
    public function testValidateFormFailure()
    {
        $formData = 10;
        $validation = GRUB\Validator\Validator::validateIngredient($formData);
        $expected = 10;
        $this->assertEquals($validation, $expected);
    }

    /**
     * Tests the type-hinting of the validateForm function
     */
    public function testValidateFormMalformed()
    {
        $formData = ['jelly'];
        $this->expectException(TypeError::class);
        $case = GRUB\Validator\Validator::validateIngredient($formData);
    }
}
