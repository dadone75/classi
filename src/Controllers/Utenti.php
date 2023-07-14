<?php

namespace Davide\Classi\Controllers;

use Davide\Classi\Services\Mysql;
use Davide\Classi\Services\Render;

class Utenti
{


    public static function index(array $request)
    {
        if(!isset($_SESSION["username"])){

         header("Location: ".$_ENV['BASE_URL']."/login");
         exit;
         
        }
        $table = "utenti";

        $db = new Mysql();

        $var = $db->index($table);

        $view_params = ["utenti" => $var];

        Render::view("Utenti/Index", $view_params);

    }
    public static function show(array $request,array $params)
    {
        
        $table = "utenti";
        $id=$params["id"];
        $db = new Mysql();

       //$var = $db->index($table);
        
        $var = $db->show($table,$id);

        $view_params = ["utente" => $var[0]];
        
        Render::view("Utenti/Show", $view_params);

    }

    public static function show_slug(array $request,array $params)
    {
        
        $table = "utenti";
        $slug=$params["slug"];
        $db = new Mysql();

       //$var = $db->index($table);
        
        $var = $db->show($table,$slug);

        $view_params = ["utente" => $var[0]];
        
        Render::view("Utenti/Show", $view_params);

    }

    public static function filtra(array $request)
    {
        
        $db = new Mysql();
        $var = $db->filtra($request["username"]);

        $view_params = $var;
        
        Render::view("Utenti/Filtra", $view_params);

    }


    public static function create(){

        Render::view("Utenti/Create",[]);

    }

    public static function store(array $request){

        $db = new Mysql();
        $table = "utenti";
         $var = $db->create($table,$request);
         header("Location: ".$_ENV['BASE_URL']."/utenti");
         exit;
    }

}

?>