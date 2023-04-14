<?php
namespace models;
class User {

    public $first_name;
    public $last_name;
    public $birthday;
    public $birth_city;
    public $regione_id;
    public $provincia_id;
    public $gender;
    public $username;
    public $password;

    public function label()
    {
        return $this->first_name." ".$this->last_name;
    }



public static function arrayToUser($class_array){
    $user=new User;
    foreach ($class_array as $class_attribute => $value_of_class_attribute) {
        //"first_name --> $user->first_name = "Paolo"
        $user->$class_attribute = $value_of_class_attribute;
    }
    return $user;
}




}