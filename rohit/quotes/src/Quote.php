<?php

namespace Rohit\Quotes;

class Quote {

    public static function quotes($category = ''){
        $url = 'https://api.api-ninjas.com/v1/quotes?category=' . $category;
        $apiKey = '0lBHoZw3Wn8/nYoR8n7AOg==2RMXXHdBZjvo042Y';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-Api-Key: ' . $apiKey]);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $quotes = curl_exec($ch);

        if ($quotes === false) {
            $error = curl_error($ch);
            echo 'Error: ' . $error;
        }

        curl_close($ch);

        return $quotes;
    }
}
