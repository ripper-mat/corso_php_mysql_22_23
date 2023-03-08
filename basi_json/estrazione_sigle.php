<?php
include "config.php";

$province_string = file_get_contents('province.json');
$province_object = json_decode($province_string);

$sigle_array=array_map(function($provincia){
    return $provincia->sigla;
}, $province_object);



$dsn = ("mysql:host=".DB_HOST.";dbname=".DB_NAME);

try {
    $conn = new PDO($dsn,DB_USER,DB_PASSWORD);
    foreach($sigle_array as $sigla){
        //$sigla = addslashes($provincia);
        $sql="INSERT INTO province (sigla) VALUES('$sigla')";
        echo $sql."\n";
        $conn->query($sql);
    }
    echo "Connected successfully"; 
  } catch(\Throwable $e) {
    throw $e;
  }