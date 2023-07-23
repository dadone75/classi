<?php

namespace Davide\Classi\Services;
use GuzzleHttp\Client;

class Api{


public static function binance(string $url):string{
    //'/api/v3/ticker/price?symbol=EURUSDT'
        $api_key = $_ENV['API_KEY'];
        $api_secret = $_ENV['API_SECRET'];  
        
        $client = new Client(['base_uri' => 'https://api.binance.com']);
        $headers = [
            'X-MBX-APIKEY' => $api_key,        
            'Accept'        => 'application/json',
        ];

        $api = $client->request('GET', $url, [
        'headers' => $headers
    ]);
    
    return $api->getBody()->getContents();

}


}