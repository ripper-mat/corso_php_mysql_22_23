<?php

use Registry\it\Regione;

require "./config.php";
require "./form_in_php/class/Registry/it/Regione.php";
//qui creo una classe regioni che comprende un metodo all()
//$regioni = new Regioni();
//$regioni->all(); //Array di (stdClass) regioni

//metodo statico invece può essere eseguitosenza creare un' istanza di regioni
Regione::all();