<?php

use Davide\Classi\Controllers\Mondo;
use Davide\Classi\Controllers\Pianeti;

define('BASE_DIR', __DIR__);
//posso richiamarla senza $ come le altre variabili
require BASE_DIR.'/vendor/autoload.php';


$mondo=new Mondo();

echo $mondo::mondo();

$circonferenza=120;
$nome="plutone";
$distanza=10000;
$array=["plutone","mercurio","venere"];

$pianeti=new Pianeti($circonferenza,$nome,$distanza,$array);

$pianeti->setCirconferenza(1234);
echo "<br>Pianeta: {$pianeti->nome} Circonferenza: {$pianeti->getCirconferenza()} Distanza Dalla Terra: {$pianeti->getDistanzaTerra()}<br>";

$arr=$pianeti->getArray();

foreach($arr as $value){

    echo "{$value}<br>";
}

unset($array);
$array=["nome"=>"plutone","Circonferenza"=>"100","DistanzaTerra"=>"1000"];
var_dump($array);
echo"<br>";
$pianeti->setArray($array);

$arr=$pianeti->getArray();

foreach($arr as $index=>$value){

    echo "{$index}-{$value}<br>";

}


unset($array);
$array=[
    ["nome"=>"plutone","Circonferenza"=>400,"DistanzaTerra"=>10000],
    ["nome"=>"mercurio","Circonferenza"=>500,"DistanzaTerra"=>2000],
    ["nome"=>"venere","Circonferenza"=>800,"DistanzaTerra"=>5000]
];

$array2=[
    ["nome"=>"giove","Circonferenza"=>550,"DistanzaTerra"=>1000],
    ["nome"=>"saturno","Circonferenza"=>580,"DistanzaTerra"=>200],
    ["nome"=>"terra","Circonferenza"=>890,"DistanzaTerra"=>0]
];

$pianeti->setArray($array);

$arr=$pianeti->getArray();
$arr= array_reverse($arr);
$arr=array_merge($arr,$array2);

shuffle($arr);

foreach($arr as $riga){
    foreach($riga as $index=>$value){

        echo "{$index}-{$value}<br>";

    }

}



?>