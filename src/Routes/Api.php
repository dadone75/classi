<?php

use Davide\Classi\Services\Route;
use Davide\Classi\Controllers\Meteo;
use Davide\Classi\Controllers\Utenti;
use Davide\Classi\Controllers\Autenticazione;

Route::post("/api/login",Autenticazione::class,"loginApi");
Route::get("/api/utenti",Utenti::class,"utentiApi");
Route::get("/api/meteo/(lat)/(lon)",Meteo::class,"meteoApi","float");

?>