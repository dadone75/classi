<?php

use Davide\Classi\Controllers\Mondo;
use Davide\Classi\Controllers\Pianeti;

$mondo= new Mondo();

echo "{$mondo::mondo()}<br>";

$lista=[];
$nome="terra";

$pianeti= new Pianeti(0,$nome,0,$lista);

echo $pianeti->getResult($nome)."<br>";

$arr=$pianeti->getDati($nome);

$new=array_filter($arr,function($value){
    
    return $value["nome"]=="plutone";

});

usort($new, function($elemento1,$elemento2){

    return $elemento2["data"]<=>$elemento1["data"];
});

foreach($new as $riga){

    foreach($riga as $index=>$value){

        echo "{$index} - {$value}<br>";

    }

}


?>