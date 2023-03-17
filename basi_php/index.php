<!-- tutto quello scritto tra ?php...? è php di solito è nel body di un html-->
<!-- tutte le variabili di php iniziano con $ non obbligatoriamente tipizzate-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nome="Mario";
        $eta= 50;
        // in php ci sono gli oggetti ma un array non è un oggetto quindi niente "new array"
        // esisite però l'arrayobject
        $passatempi = array("Tennis", "Cinema", "no sport");

        function saluta($nome){
            return "Ciao io sono $nome, come va?";
            // versione php
            // return "Ciao io sono $nome, come va?"
            // versione javascript con backtick
            // `Ciao io sono ${nome}, come va?`
        }
        // echo stampa a schermo
        echo "<h1>Scrivo qualcosa a schermo</h1>";
        echo saluta("Gianni");
        // il concatenatore di stringhe in php è il punto, il + somma normalmente
        echo "<h2>".saluta($nome)."</h2>";
        echo "<p>".saluta($nome)."</p>";
        echo "<div>".saluta($nome)."</div>";
        // posso anche decidere di mettere la parte di html (p o div..) nel return della funzione in modo da stampare tutti nello stesso elemento
        // ma così ho meno spazio di manovra se voglio cambiare da uno all'altro

        // Questo da errore/warning perchè l'array non è una stringa o un numero e echo non può visualizzarlo
        // echo $passatempi;

        echo "<ul>";
        // passatempi.length diventa:
        for($i=0; $i< count($passatempi); $i++){
            echo "<li>".$passatempi[$i]."</li>";
        }
        echo "</ul>";

        // il comando die(); fa morire il php e i comandi sotto di lui non vengono più eseguiti
        
    ?>
    
</body>
</html>