<?php
// // echo "ciao";

// // apice singolo non interpreta le variabili, neanche \n funziona
// // es
// // $nome="mario";
// // echo "\tciao $nome\n";
// // echo 'ciao $nome\n';

// #index array
// // scorciatoia per $colori = array();
// $colori = ['red', "green", "blue"];

// echo "\n\n".$colori[2]."\n";

// #array associativo
// $persona = [
//     'email' => "a@b.it",
//     "nome" => 'Mario',
//     "cognome" => "Rossi"
// ];

// print_r($persona);
// #var_dump da più info ma è più disordinato
// // var_dump($persona);
// echo $persona['email']."\n";
// // echo non puo stampare elementi più complessi di  una string o un numero
// // es echo $persona; non funziona

// #array indicizzato di array associativi
$classe = array(
    [
    'email' => "a@b.it",
    "cognome" => "Rossi",
    "nome" => 'Mario'
    ],
    [
    'email' => "c@d.it",
    "cognome" => "Verdi",
    "nome" => 'Giovanni'
    ]
);

//print_r($classe[1]['nome']);
echo "------------------------------\n*FOR*\n";
//per stampare tutti i nomi con ciclo for
for ($i=0; $i < count($classe); $i++) { 
  $allievo = $classe[$i];
  echo $allievo['nome']."\n"; 
}
echo "------------------------------\n*FOREACH*\n";
// stampare i nomi con il foreach
foreach ($classe as $i => $allievo) {
    // elenco puntato autoincrementante
    echo($i+1) . ")";
    // nome allievo
    echo $allievo['nome']."\n";
}

// stampare con il map, vantaggi= posso separare funzione e richiamo della funzione con array_map
echo "------------------------------\n*MAP*\n";

function stampaNome($allievo){
    echo $allievo['nome']."\n";
}

array_map('stampaNome', $classe);

?>