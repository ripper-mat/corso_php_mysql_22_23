<?php
include "config.php";

$province_string = file_get_contents('province.json');
$province_object = json_decode($province_string);


// $dsn = ("mysql:host=".DB_HOST.";dbname=".DB_NAME);
// try {
//     $conn = new PDO($dsn,DB_USER,DB_PASSWORD);
// foreach($regioni_unique as $regione){
//     $regione = addslashes($regione);
//     $pdo_stm= $conn->query("SELECT regione_id FROM regioni WHERE nome = '$regione'");
//     $regione_id = $pdo_stm->fetchColumn();
//     print_r($regione_id);
// } 
// echo "Connected successfully"; 
// } catch(\Throwable $e) {
//   throw $e;
// }

$dsn = ("mysql:host=".DB_HOST.";dbname=".DB_NAME);
try {
    $conn = new PDO($dsn,DB_USER,DB_PASSWORD);
    foreach ($province_object as $key => $provincia) {
        $regioni= $provincia->regione;
        $nomi_province = addslashes($provincia->nome);
        $sigle = addslashes($provincia->sigla);
        $pdo_stm= $conn->query("SELECT regione_id FROM regioni WHERE nome = \"$regioni\"");
        $regione_id = $pdo_stm->fetchColumn();
        $sql="INSERT INTO province (nome_provincia, sigla, regione_id) VALUES('$nomi_province', '$sigle', $regione_id)";
        echo $sql."\n";
        $conn->query($sql);
    }
    echo "Connected successfully"; 
}catch (\Throwable $e) {
    throw $e;
}
print_r($regioni);
print_r($nomi_province);
print_r($sigle);




  ?>