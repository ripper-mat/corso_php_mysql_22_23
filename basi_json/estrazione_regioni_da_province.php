<?php

include "config.php";

// con i file json non serve il required ma:
$province_string = file_get_contents('province.json');
$province_object = json_decode($province_string);

//print_r($province_object);

$regioni_array= array_map(function($provincia){
    return $provincia->regione;
},$province_object);

$regioni_unique = array_unique($regioni_array);
sort($regioni_unique);



;

//print_r($sigle_array);




$dsn = ("mysql:host=".DB_HOST.";dbname=".DB_NAME);

try {
    $conn = new PDO($dsn,DB_USER,DB_PASSWORD);
// per la valle d'aosta da errore perchè c'è l'apostrofo che apre e chiude il comendo, per ovviare mettere un \ davanti a ' (valle d\'aosta)
    foreach($regioni_unique as $regione){
        $regione = addslashes($regione);
        $sql="INSERT INTO regioni (nome) VALUES('$regione')";
        echo $sql."\n";
        $conn->query($sql);
    }
    echo "Connected successfully"; 
  } catch(\Throwable $e) {
    throw $e;
  }







?>