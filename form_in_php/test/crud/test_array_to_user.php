<?php
require "form_in_php/test/test_autoload.php";
/*variabile di variabile*/

use models\User;

// $colore="blue";
// $$colore;
//$$colore diventa $blue perchè il contenuto della prima variabie diventa la seconda variabile


# php form_in_php/test/crud/test_array_to_user.php
$class_array =
[
    "first_name" => "Paola",
    "last_name"  => "Binchi",
    "birthday"  => "2020-12-20",
    "birth_city"  => "Givoletto",
    "regione_id"  => 10, 
    "provincia_id"  => 3,
    "gender"  => "F",
    "username"  => "a@b.it",
    "password"  => "cicicio"
];

// $class_name = User::class;
// $user = new $class_name;

// $user=new User;

$user = User::arrayToUser($class_array);
if(get_class($user)== User::class){
    echo "\ntest passato è un oggetto";
    print_r($user);
}
// print_r($user);