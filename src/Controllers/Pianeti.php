<?php

namespace Davide\Classi\Controllers;


class Terra extends Pianeti{

    public string $altro_parametro;
    public float $circ;

    //circ riempe la variabile circonferenza del costruttore padre
    public function __construct(string $altro_parametro, float $circ){

        parent::__construct($circ,"terra",0,[]);

        $this->altro_parametro=$altro_parametro;

    }

}

class Pianeti
{
    public float $circonferenza;
    public string $nome;
    public float $distanzaTerra;
    public array $altri;

    public function __construct(float $circonferenza, string $nome, float $distanzaTerra, array $altri)
    {
$circonferenza=12;
        $this->circonferenza = $circonferenza;
        $this->nome = $nome;
        $this->distanzaTerra = $distanzaTerra;
        $this->altri = $altri;

    }

    
    public function getResult(string $nome){

        if($nome=="plutone"){

            $this->circonferenza=1200;

        }else{

            $this->circonferenza=600;

        }

        return $this->circonferenza;

    }

    public function setCirconferenza($circonferenza): void
    {

        $this->circonferenza = $circonferenza;

    }

    public function setNome($nome): void
    {

        $this->nome = $nome;

    }

    public function setDistanzaTerra($distanzaTerra): void
    {

        $this->distanzaTerra = $distanzaTerra;

    }
    
    public function setArray($altri):void{

        $this->altri=$altri;


    }

    public function getCirconferenza(): float
    {

        return $this->circonferenza;


    }

    public function getNome(): string
    {

        return $this->nome;


    }

    public function getDistanzaTerra(): float
    {

        return pow($this->distanzaTerra,2);


    }

    public function getArray():array{

        return $this->altri;


    }

    public static function getDati($nome){

        $array=[
        ["nome"=>"plutone",
        "densita"=>10,
        "ossigeno"=>0,
        "data"=>"2023-05-01"],
        ["nome"=>"saturno",
        "densita"=>50,
        "ossigeno"=>0,
        "data"=>"2023-05-01"],
        ["nome"=>"mercoledi",
        "densita=>20",
        "ossigeno"=>0,
        "data"=>"2023-05-01"],
        ["nome"=>"plutone",
        "densita"=>130,
        "ossigeno"=>0,
        "data"=>"2022-05-01"],
        ["nome"=>"plutone",
        "densita"=>120,
        "ossigeno"=>0,
        "data"=>"2021-05-01"],
        ];
            return $array;
        }

    } 




?>