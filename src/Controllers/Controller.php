<?php

namespace Davide\Classi\Controllers;

use Davide\Classi\Services\Render;

class Controller{

    public static function home(array $request){
       
        //richiamo un metodo statico dalla classe rendere
        //il metodo statico fuori dalla classe
        //si chiama con nomeclasse::metodo

        Render::view("Home",array());
        

    } 

    public static function pagina(array $request){

        //richiamo un metodo statico dalla classe rendere
        //il metodo statico fuori dalla classe
        //si chiama con nomeclasse::metodo

        Render::view("Pagina",array());
        

    } 

    public static function mondo(array $request){

        //richiamo un metodo statico dalla classe rendere
        //il metodo statico fuori dalla classe
        //si chiama con nomeclasse::metodo

        Render::view("Mondo",array());
        

    } 
}
