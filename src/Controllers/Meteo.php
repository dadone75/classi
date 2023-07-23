<?php

namespace Davide\Classi\Controllers;

use Davide\Classi\Services\Mysql;
use Davide\Classi\Services\Render;

class Meteo{

    public static function meteo(array $request){
      
        Render::view("FrontEnd/Meteo",array());
        
    } 

    public static function meteoApi(array $request,array $params){
        
        $db = new Mysql();
        $var = $db->isApiAutenticated();
        

         if($var===false){

            header("HTTP/1.1 403 Forbidden");
            exit;
            
           }
          
        //installa guzzle
        //per passare il otken del fornitore delle api

        //$token = 'someToken';//lo metti nell env
        //$client = new GuzzleHttp\Client(['base_uri' => 'https://api.open-meteo.com/v1/']);
        /*$headers = [
            'Authorization' => 'Bearer ' . $token,        
            'Accept'        => 'application/json',
        ];

        $api = $client->request('GET', 'orecast?latitude=".$params["lat"]."&longitude=".$params["lon"]."&current_weather=true&hourly=temperature_2m,relativehumidity_2m,windspeed_10m', [
        'headers' => $headers
    ]);
    
    $risposta_decodificata=json_decode($api,true);

        */
        $api=file_get_contents("https://api.open-meteo.com/v1/forecast?latitude=".$params["lat"]."&longitude=".$params["lon"]."&current_weather=true&hourly=temperature_2m,relativehumidity_2m,windspeed_10m");
        
        $risposta_decodificata=json_decode($api,true);

        $temperature=$risposta_decodificata["current_weather"]["temperature"];

        echo json_encode(["temperature" => $temperature]); 
        
    } 

}
