<?php

class ValidateDate implements Validable {

    public function isValid($value)
    {
        $sanitize = trim(strip_tags($value));
        $dt = DateTime::createFromFormat('d/m/Y',$sanitize);
        if($dt && $dt->format('d/m/Y') === $sanitize) {

            return $dt->format('d/m/Y');
        
        }else{
        
            return false;
        
        };
    }
    

    public function message()
    {
        return 'data non valida';
    }

}