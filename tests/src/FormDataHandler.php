<?php
require_once('../../vendor/autoload.php');
require_once('../../src/FormDataHandler.php');
use PHPUnit\Framework\TestCase;

class FormTest extends TestCase
{
    /**
     * Tests for success of the FormDataHandler function
     */
    public function testFormDataHandlerSuccess()
    {
        $formData = ["onions" => "on", "turnip" => "on", "lemon" => "on",'userIngredients'=>'mint lamb'];
        $formDataHandler= new GRUB\FormDataHandler();
        $validation  = $formDataHandler->processData($formData);
        $expected = ["onions", "turnip", "lemon",'mint','lamb'];
        $this->assertEquals($expected , $validation);
    }

    /**
     * Tests for graceful failure of the FormDataHandler function
     */
    public function testFormDataHandlerFailure() {
        $formData = [10, 41, 3259703498,'345'];
        $formDataHandler= new GRUB\FormDataHandler();
        $validation  = $formDataHandler->processData($formData);
        $expected = ['', '1', '2','3'];
        $this->assertEquals($validation, $expected);
    }

    /**
//     * Tests the type-hinting of the FormDataHandler function
//     */
    public function testFormDataHandlerMalformed()
    {
        $formData = "beans";
        $this->expectException(TypeError::class);
        $formDataHandler = new GRUB\FormDataHandler();
        $case = $formDataHandler->processData($formData);
    }
}
