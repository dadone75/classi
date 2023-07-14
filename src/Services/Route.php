<?php
/*
namespace Davide\Classi\Services;

use Davide\Classi\Controllers;

class Route{

    public static function get(string $url,string $controller,string $method):void{
       
        //si esegue questa if perchè vengo instadato solo sulla rotta che sto aprendo nel browser
        //associando il metodo del controller all'url
        //se non metto la if la risposta è un reindirizzamento su tutte le rotte
        
         if($_SERVER["REQUEST_URI"]==$url){
            
            //var_dump($controller."|".$method);
            $controller::$method();


        }

    }

}
*/

namespace Davide\Classi\Services;

class Route
{
    public static function post(string $url, string $controller, string $method,?string $type="number"): void
    
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $request=$_POST;
            self::checkRoute($url,$controller,$method,$request,$type);
            
        }

    }

    public static function get(string $url, string $controller, string $method,?string $type="number"): void
    
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $request=$_GET;
            self::checkRoute($url,$controller,$method,$request,$type);

        }

    }

    public static function checkRoute(string $url, string $controller, string $method, array $request,?string $type="number"): void{

//il metodo parse url esclude la parte dei dati passati in get esempio ?id=1;

        $url_richiesto = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url_rotta = parse_url($_ENV["BASE_URL"]. $url, PHP_URL_PATH);

        ///utenti/(id)
        $array_url_rotta = explode("/", $url_rotta);
        //utenti/variabile numero o stringa esempio /utenti/5

        $array_url_richiesto = explode("/", $url_richiesto);
        
        $params = array();

        if (count($array_url_richiesto) == count($array_url_rotta)) {

            //ciclo l'array
            //se non entro nei parametri e i le url corrispondono
            //arrivo alla fine e chiamo la pagina senza paramtri
            //altrimenti passo i parametri e chiamo la pagina con i parametri
            //riempio i parametri prendendo in sequenza quelli passati alla rotta
            //in questo caso ho un solo parametro id
            //se non c'è corrispondenza non ritorna nulla

            foreach ($array_url_richiesto as $index => $value) {
                
                if ($value == $array_url_rotta[$index]) {

                } else if (substr($array_url_rotta[$index], 0, 1) == "(" && (($type=="number" && is_numeric($value) == true) || ($type=="string" && is_string($value) == true))) {

                  
                    
                    //entro qui quando il valore dell'indice dell'array non è lo stesso
                    //perchè da una parte ho (id) e dall'altra ho il valore numerico ad esempio 5
                    //riempio i parametri
                    //riempio l'array con la variabile che trovo in questo caso id conm il valore che scrivo ad esempio 5

                    //guarda la variabile passata dalla pagina index.php per richiamare un utente
                    //viene passata la variabie subito dopo utenti/
                    $params[substr($array_url_rotta[$index], 1, -1)] = $value;

                } else {

                    //se rotta e url non sono uguali non chiami il metodo
                    return;

                }

            }
            
            // var_dump(...array_values($params));

            //è la if fatta con l'operatore ternario 
            //non apro if tonde o graffe ma metto la condizione fino a ?. quindi eseguo l'istruzione se vero. dopo i : eseguo else
            //non chiudo con le graffe


            $params != [] ? $controller::$method($request,$params) : $controller::$method($request);

        }

    }


}


?>