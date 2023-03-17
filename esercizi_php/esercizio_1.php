<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 1</title>
</head>
<body>
    <?php
    // Scrivere una funzione "array2ul" che dato un array come argomento
    // return una stringa che rappresenta un elenco html (ul)
    // String array2ul(Array $array)
    // echo array2ul(array("rosso","verde"))
    // <ul>
    //     <li>rosso</li>
    //     <li>verde</li>
    // </ul>
    

    $numeri= array(1,2,3,4,5);
    $colori = array("Rosso", "Verde", "Giallo");

    function array2ul(Array $array){
        $stringa = "<ul>";
        for($i=0; $i< count($array); $i++){
            $stringa .= "<li>$array[$i]</li>";
        }
        $stringa.= "</ul>";
        return $stringa;
    }
    
    echo array2ul($numeri);

    ?>
</body>
</html>