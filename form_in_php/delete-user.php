<?php
use crud\UserCRUD;

require "./autoload.php";
require "./config.php";

$user_id = filter_input(INPUT_GET, "user_id", FILTER_VALIDATE_INT);
if($user_id){
    (new UserCRUD)->delete($user_id);
    header("location: index.php");
}else{
    echo "problemi";
}