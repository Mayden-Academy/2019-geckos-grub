<?php

namespace GRUB;

class Curl {

    const BASEURL = "http://www.recipepuppy.com/api/";

    /**
     * @var array of user selected ingredients
     */
    private $ingredients;

    /**
     * function converting ingredients to recipes
     *
     * @return array recipes from recipe puppy
     */
    public function makeRequest(): array
    {
        $ingredientsString = implode(',', $this->ingredients);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::BASEURL . '?i=' . $ingredientsString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($output, true);
        return $output;
    }

    /**
     * construct that requires ingredients array
     */
    public function __construct($ingredients)
    {
    $this->ingredients = $ingredients;
    }

}