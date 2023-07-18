<?php

namespace Davide\Classi\Controllers;

use Davide\Classi\Services\Render;

class Meteo{

    public static function meteo(array $request){
      
        Render::view("FrontEnd/Meteo",array());
        

    } 

    
    public static function meteoApi(array $request,array $params){

        $api=file_get_contents("https://api.open-meteo.com/v1/forecast?latitude=45.52&longitude=13.41&current_weather=true&hourly=temperature_2m,relativehumidity_2m,windspeed_10m");
        $risposta_decodificata=json_decode($api,true);

       
        $temperature=$risposta_decodificata["current_weather"]["temperature"];

        echo json_encode(["temperature" => $temperature]); 
        

    } 

}
