<?php

require_once('../../src/Validator.php');
use PHPUnit\Framework\TestCase;

class RecipeTest extends TestCase
{
    /**
     * Tests for success of the validateForm function
     */
    public function testValidateFormSuccess()
    {
        $formData = ["onions" => "on", "turnip" => "on", "lemon" => "on"];
        $validation  = GRUB\Validator::ValidateForm($formData);
        $expected = ["onions", "turnip", "lemon"];
        $this->assertEquals($validation, $expected);
    }

    /**
     * Tests for graceful failure of the validateForm function
     */
    public function testValidateFormFailure() {
        $formData = [10, 41, 3259703498];
        $validation = GRUB\Validator::ValidateForm($formData);
        $expected = [0, 1, 2];
        $this->assertEquals($validation, $expected);
    }

    /**
     * Tests the type-hinting of the validateForm function
     */
    public function testValidateFormMalformed()
    {
        $formData = "beans";
        $this->expectException(TypeError::class);
        $case = GRUB\Validator::ValidateForm($formData);
    }
}
