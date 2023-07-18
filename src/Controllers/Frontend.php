<?php

namespace Davide\Classi\Controllers;

use Davide\Classi\Services\Render;

class Frontend
{

    
public static function login(array $request){

//richiamo un metodo statico dalla classe rendere
//il metodo statico fuori dalla classe
//si chiama con nomeclasse::metodo

Render::view("FrontEnd/Login",array());


} 

}
?>