<?php

session_start();

//ricordati il file .htaccess

use Dotenv\Dotenv;
use Davide\Classi\Services\Route;
use Davide\Classi\Controllers\Utenti;
use Davide\Classi\Controllers\Controller;
use Davide\Classi\Controllers\Regular;

//definizione di costanti
define('BASE_DIR', __DIR__);
//posso richiamarla senza $ come le altre variabili
require BASE_DIR.'/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(BASE_DIR);
$dotenv->load();

//in questo caso credo che punto sulla classe Controller
//e il terzo parametro indica il metodo
//della classe Controller da usare
//il sito apre la index che a sua volta gira sulla rotta home


//qui va sulla home perchè è l'indirizzo / di partenza 
//metto poi tutte le rotte

require BASE_DIR.'/src/Routes/Web.php';
require BASE_DIR.'/src/Routes/Api.php';

?>