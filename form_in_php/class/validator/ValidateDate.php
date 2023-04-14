<?php
namespace validator;
class ValidateDate implements Validable {

     /** @var string rappresenta il valore immesso nel form ripulito */
    private $value;
    private $message;

    /** se il valore è valido e se devo visualizzare il messaggio  */
    private $valid;

    public function __construct($default_value='',$message='è obbligatorio') {
        $this->value = $default_value;
        $this->valid = true;
        $this->message = $message;
    }

    public function isValid($value)
    {
        $strip_tag = strip_tags($value);
        $sanitize = trim($strip_tag);
        
        $dt = \DateTime::createFromFormat('Y-m-d',$sanitize);
        if($dt && $dt->format('Y-m-d') === $sanitize) {

            return $dt->format('Y-m-d');
        
        }else{
            return false;
        };
    }
    

    public function getValue()
    {
      return $this->value;
    }
   
    public function getMessage()
    {
      return $this->message;
    }
   
    public function getValid()
    {
      return $this->valid;
    }

}