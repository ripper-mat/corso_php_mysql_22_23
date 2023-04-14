<?php 
// include "../../../config.php";

use crud\UserCRUD;
use models\User;

include "form_in_php/config.php";
include "form_in_php/test/test_autoload.php";

(new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE user;");
$crud = new UserCRUD();
$user = new User();
$user2 = new User();
// 
$user->first_name = "Mario";
$user->last_name = "Rosso";
$user->birth_city = "Torino";
$user->birthday = "2017-01-01";
$user->gender = "M";
$user->regione_id = 9;
$user->provincia_id = 15;
$user->username = "mariorossi@email.com";
$user->password = md5('Password');

$user2->first_name = "Pippo";
$user2->last_name = "Verde";
$user2->birth_city = "Napoli";
$user2->birthday = "2000-10-25";
$user2->gender = "M";
$user2->regione_id = 9;
$user2->provincia_id = 15;
$user2->username = "pippoverde@email.com";
$user2->password = md5('Password');

$result = $crud->read(); //7 array | vuoto 
if($result === false ){
    echo "\ndatabase iniziale vuoto\n";
};

$crud->create($user);

$result = $crud->read(1); // User
if(class_exists(User::class) && get_class($result) == User::class ){
    echo "\nread utente esistente test superato\n";
}

// print_r($result);
$result = $crud->read(2); //  false
if($result === false){
    echo "\nutente non esistente superato\n";
}


//print_r($result);
$result = $crud->read(); //7 array | vuoto 
if(is_array($result) && count($result) === 1 ){
    echo "\nricerca di tutti gli utenti (1)\n";
};


// $crud->delete(1);
// $result = $crud->read(1);
// if($result === false){
//     echo "\nutente con id 1 è stato eliminato\n";
// }

// TODO: inserire un secondo utente per  testare la cancellazione singola

var_dump($result);

$result = $crud->update(3, $user2);
if($result == 1){
    echo "\nutente aggiornato\n";
}elseif($result>1){
    echo "\ntroppi utenti aggiornati";
}elseif($result==0){
    echo "\nnessun utente aggiornato";
}