<?php

use Davide\Classi\Controllers\Binance;
use Davide\Classi\Services\Route;
use Davide\Classi\Controllers\Meteo;
use Davide\Classi\Controllers\Utenti;
use Davide\Classi\Controllers\Regular;
use Davide\Classi\Controllers\Frontend;
use Davide\Classi\Controllers\Controller;
use Davide\Classi\Controllers\Autenticazione;
//ricordati il file .htaccess


Route::get("/",Controller::class,"home");
Route::get("/pagina",Controller::class,"pagina");
Route::get("/mondo",Controller::class,"mondo");
Route::get("/utenti",Utenti::class,"index");
Route::get("/utenti/create",Utenti::class,"create");
Route::post("/utenti",Utenti::class,"store");
Route::get("/utenti/(id)",Utenti::class,"show");
Route::get("/utenti/(slug)",Utenti::class,"show_slug","string");
Route::get("/regular",Regular::class,"test");
Route::get("/login",Autenticazione::class,"index");
Route::post("/login",Autenticazione::class,"login");
Route::get("/vedi",Autenticazione::class,"vedi");
Route::post("/filtra",Autenticazione::class,"filtra");
Route::get("/cerca",Utenti::class,"cerca");
Route::get("/logout",Autenticazione::class,"logout");


Route::get("/frontend/login",Frontend::class,"login");
Route::get("/frontend/meteo",Meteo::class,"meteo");
Route::get("/frontend/binance",Binance::class,"binance");
?>
