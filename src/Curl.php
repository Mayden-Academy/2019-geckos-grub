<?php

namespace GRUB;

class Curl {

    const BASEURL = "http://www.recipepuppy.com/api/";

    private $ingredients;

    /**
     * function converting ingredients array to string data from recipepuppy
     *
     * @return multi-dimensional associative array
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

//code to test with:
//$curl = new Curl(['sausage', 'onion', 'garlic']);
//var_dump($curl->makeRequest());