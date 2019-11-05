<?php

namespace GRUB;

/**
 * Class Curl
 *
 * @param $ingredientsArray array of checked ingredients
 *
 * @return curl connection
 */
class Curl {

    const BASEURL = "http://www.recipepuppy.com/api/";

        private function makeRequest(array $ingredientsArray)
        {
            $ingredientsString = implode(', ', $ingredientsArray);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, self::BASEURL);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            var_dump($output);



//            json decoded
        }

}