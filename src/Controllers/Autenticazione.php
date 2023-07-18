<?php

namespace Davide\Classi\Controllers;

use Davide\Classi\Services\Mysql;
use Davide\Classi\Services\Render;

class Autenticazione
{


    public static function index()
    {
        $view_params = [];

        Render::view("Login", $view_params);

    }

    public static function logout()
    {
        $view_params = [];
        session_unset();

        header("Location: ".$_ENV['BASE_URL']."/login");

    }

    public static function loginApi(array $request){

        $db = new Mysql();

        $db->loginApi($request["username"],$request["password"]);
         
        

    }


    public static function login(array $request){

        $db = new Mysql();

        $db->login($request["username"],$request["password"]);
         
         if(isset($_SESSION["username"])){
           
            header("Location: ".$_ENV['BASE_URL']."/vedi");

         }else{

            header("Location: ".$_ENV['BASE_URL']."/login?username=".$request["username"]);

         }
         exit;

    }

    public static function vedi()
    {
        $view_params = [];

        Render::view("Vedi", $view_params);

    }

    public static function filtra(array $request){

       
        $username=$request["username"];
        $db = new Mysql();

        $view_params = $db->filtra($username);

        Render::view("Cerca", $view_params);

    }



}

?>