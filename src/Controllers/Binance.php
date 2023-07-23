<?php

namespace Davide\Classi\Controllers;

use GuzzleHttp\Client;
use Davide\Classi\Services\Api;
use Davide\Classi\Services\Mysql;
use Davide\Classi\Services\Render;

class Binance
{



    public static function symbols(array $request)
    {

        $db = new Mysql();
        $var = $db->isApiAutenticated();


        if ($var === false) {

            header("HTTP/1.1 403 Forbidden");
            exit;

        }


        $lista = Api::binance('/api/v3/exchangeInfo');
        echo json_encode($lista);


       
    }


    public static function binance(array $request)
    {

        Render::view("FrontEnd/Binance", array());

    }

    public static function aperturaApi(array $request, $cambio)
    {


        $db = new Mysql();
        $var = $db->isApiAutenticated();


        if ($var === false) {

            header("HTTP/1.1 403 Forbidden");
            exit;

        }


        $lista = Api::binance('/api/v3/klines?symbol=' . $cambio["cambio"] . '&interval=1d');
        echo $lista;

    }

    public static function cambioApi(array $request, $cambio)
    {


        $db = new Mysql();
        $var = $db->isApiAutenticated();


        if ($var === false) {

            header("HTTP/1.1 403 Forbidden");
            exit;

        }


        echo Api::binance('/api/v3/ticker/price?symbol=' . $cambio["cambio"]);


        //https://binance-docs.github.io/apidocs/spot/en/#general-info
        //https://developernote.com/2020/10/sample-binance-api-queries/

        /*
                $api_key = $_ENV['API_KEY'];
                $api_secret = $_ENV['API_SECRET'];  
                
                
                $client = new Client(['base_uri' => 'https://api.binance.com']);
                $headers = [
                    'X-MBX-APIKEY' => $api_key,        
                    'Accept'        => 'application/json',
                ];

                $api = $client->request('GET', '/api/v3/ticker/price?symbol=EURUSDT', [
                'headers' => $headers
            ]);
            
            echo $api->getBody()->getContents();
            


            //$risposta_decodificata=json_decode($api,true);

                /*

                $opt = [
                    "http" => [

                        "method" => "GET",
                        "header" => "User-Agent: Mozilla/4.0 (compatible; PHP Binance API)\r\nX-MBX-APIKEY: {$api_key}\r\nAccept: application/json\r\n"

                    ]
                ];

                $context = stream_context_create($opt);
                //$params['timestamp'] = number_format(microtime(true)*1000,0,'.','');
                $params['symbol'] ='BTCUSDT';
                $query = http_build_query($params, '', '&');
                $signature = hash_hmac('sha256', $query, $api_secret);
                $endpoint = "https://api.binance.com/api/v3/depth";
                 
                $res = file_get_contents($endpoint, false, $context);
                echo $res;
                */


    }

}