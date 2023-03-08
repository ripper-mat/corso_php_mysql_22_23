<?php
include "config.php";

$province_string = file_get_contents('province.json');
$province_object = json_decode($province_string);

// $province_array=array_map(function($provincia){
//     return $provincia->nome.' '.$provincia->sigla;
// }, $province_object);

foreach ($province_string as $nome => $provincia) {
    echo $provincia; 
};

print_r($province_string);

// $dsn = ("mysql:host=".DB_HOST.";dbname=".DB_NAME);
 
// try {
//     $conn = new PDO($dsn,DB_USER,DB_PASSWORD);
//     foreach($province_array as $provincia){
//         $provincia = addslashes($provincia);
//         $sql="INSERT INTO province (nome_provincia, sigla) VALUES('$provincia', '$sigla')";
//         echo $sql."\n";
//         $conn->query($sql);
//     }
//     echo "Connected successfully"; 
//   } catch(\Throwable $e) {
//     throw $e;
//   }



  ?>