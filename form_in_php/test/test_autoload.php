<?php

// use Registry\it\Provincia;
// use Registry\it\Regione;
// use validator\ValidateDate;
// use validator\ValidateMail;
// use validator\ValidateRequired;

// require_once "./config.php";

spl_autoload_register(function($className){
    
    // echo "\nsto cercando $className\n";
    //  validator\ValidateMail --> validator/ValidateMail 
    $className = str_replace("\\","/",$className);
    // "./class/validator/ValidateMail.php";
    require "./form_in_php/class/".$className.".php";
});


// new ValidateMail();
// new ValidateDate();
// new ValidateRequired();

// Regione::all();
// Provincia::all();