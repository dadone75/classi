<?php

namespace Davide\Classi\Services;

use mysqli;

//da terminal
//composer require vlucas/phpdotenv

class Mysql
{

    private mysqli $mysqlConnection;

    public function __construct()
    {

        $this->mysqlConnection = new mysqli(
            $_ENV['DB_HOSTNAME'],
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD'],
            $_ENV['DB_DATABASE'],
            $_ENV['DB_PORT']
        );

    }

    public function index(string $table): array
    {

        $stato = $this->mysqlConnection->prepare("select * from {$table}");
        //execute fa la query eseguendo il prepare
        $stato->execute();

        //ottiene l'oggetto del risultato
        $result = $stato->get_result();

        //converto l'oggetto $result in array associativo
        return $result->fetch_all(MYSQLI_ASSOC);


    }


    public function login(string $user, string $password): bool
    {

        $stato = $this->mysqlConnection->prepare("select * from utenti where username=? and password=? limit 1");
        $stato->bind_param("ss", $user, $password);
        $stato->execute();

        $result = $stato->get_result();

        $res = $result->fetch_all(MYSQLI_ASSOC);


        if (count($res) > 0) {

            $_SESSION["username"] = $res[0]["username"];
            return true;

        }

        return false;

    }


    public function loginApi(string $user, string $password): void
    {

        $stato = $this->mysqlConnection->prepare("select * from utenti where username=? and password=? limit 1");
        $stato->bind_param("ss", $user, $password);
        $stato->execute();

        $result = $stato->get_result();

        $res = $result->fetch_all(MYSQLI_ASSOC);


        if (count($res) > 0) {

            //creo token
            $token = uniqid();

            $stato = $this->mysqlConnection->prepare("update utenti set token=? where id=?");
            $stato->bind_param("si", $token, $res[0]["id"]);
            $stato->execute();

            echo json_encode(["token" => $token]);
            return;
        }

        header("HTTP/1.1 401 Unauthorized");

    }

    public function isApiAutenticated(): bool
    {

        $headers = apache_request_headers();

        if (isset($headers['Authorization'])) {

            $authHeader = $headers['Authorization'];
            $bearerToken = null;

            //Bearer stringa più spazio + nome token 
            //restituisce in $matches dove trova la congruenza
            //e riempie $beartoken
            if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
                $bearerToken = $matches[1];

                $stato = $this->mysqlConnection->prepare("select * from utenti where token=? and token!='' limit 1");
                $stato->bind_param("s", $bearerToken);
                $stato->execute();
        
                $result = $stato->get_result();
        
                $res = $result->fetch_all(MYSQLI_ASSOC);
        
        
                if (count($res) > 0) {
        
                    return true;
        
                }

            }
            // $bearerToken now contains the bearer token if it was found in the Authorization header
        }

        return false;
    }


    public function filtra(string $username): array
    {

        $username = "%{$username}%";

        $stato = $this->mysqlConnection->prepare("select * from utenti where username like ?");
        $stato->bind_param("s", $username);
        $stato->execute();

        $result = $stato->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);


    }

    public function show(string $table, int $id): array
    {

        //uguale a sopra con la differenza è il bind param dove passo le variabili

        $stato = $this->mysqlConnection->prepare("select * from {$table} where id=? limit 1");
        $stato->bind_param("i", $id);
        $stato->execute();

        $result = $stato->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);


    }

    public function show_slug(string $table, string $slug): array
    {

        //uguale a sopra con la differenza è il bind param dove passo le variabili

        $stato = $this->mysqlConnection->prepare("select * from {$table} where slug=?");
        $stato->bind_param("s", $slug);
        $stato->execute();

        $result = $stato->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);


    }

    public function create(string $table, array $request): bool
    {

        //il metodo join mette le vigole tra gli elementi dell'array

        $keys = join(",", array_keys($request));
        $values = array_values($request);

        //se il metodo prende il puntatore allora modifico l'array con il paramentro passato.
        //non prende il puntatore array map $questions=array_map($array)
        //prende il puntatore usort lo chiami direttamente usort($array)

        $questions = join(",", array_map(fn($value) => $value = "?", $values));

        $stato = $this->mysqlConnection->prepare("insert into {$table} ({$keys}) values({$questions})");
        $types = "";

        foreach ($values as $value) {

            if (is_int($value)) {

                $types .= 'i';

            }

            if (is_string($value)) {

                $types .= 's';

            }


        }


        $stato->bind_param($types, ...$values);

        $stato->execute();

        return true;


    }

}