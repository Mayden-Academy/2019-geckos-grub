<?php

namespace GRUB;

/**
* Used for creating an API connection
**/
class Curl {

    const BASEURL = "http://www.recipepuppy.com/api/";

    /**
     * @var array of user selected ingredients
     */
    private $ingredients;
private $ch;
    /**
     * function converting ingredients to recipes
     *
     * @return array recipes from recipe puppy
     */
    public function makeRequest(): array
    {
        $ingredientsString = implode(',', $this->ingredients);
        curl_setopt($this->ch, CURLOPT_URL, self::BASEURL . '?i=' . $ingredientsString);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($this->ch);
        curl_close($this->ch);
        $output = json_decode($output, true);
        return $output;
    }

    /**
     * construct that requires ingredients array
     */
    public function __construct($ingredients)
    {
    $this->ch = curl_init();
    $this->ingredients = $ingredients;
    }

}
