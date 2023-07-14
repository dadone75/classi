<?php

namespace Davide\Classi\Services;

class Render{

    //perchè non metto il void

    public static function view(string $url,array $view_params){
        //la classe view mette assieme la rotta e la apre
        //con la richiesta apri una volta

        require_once(BASE_DIR."/src/Views/{$url}.php");
    

    }

}



?>