<?php

$host = $_SERVER['HTTP_HOST'];

if($host== "localhost"){

    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_NAME','form_in_php');
    define('DB_PASSWORD','0_mysql_1');
}
if($host == "matteov.000webhostapp.com/"){
    define('DB_HOST','localhost');
    define('DB_USER','id20608627_php_form');
    define('DB_NAME','id20608627_form_in_php');
    define('DB_PASSWORD','B<?s6>fPtCG+dde5');
};


define('DB_DSN', 'mysql:host='.DB_HOST.';dbname='.DB_NAME);
?>