<?php

// -----------------------------------------------------EXERCICE 1 -------------------------------------------------------------
function calculCercle(){
    do{
    $rayon = readline("Bonjour, rentrez le rayon du cercle :");
    $pi = 3.14159265359;
    $circonference =  2 * $pi * $rayon;
    $surface = $pi * ($rayon*$rayon);
    echo "La circonference du cercle est de :" .round($circonference, 2);
    echo "\n La surface du cercle est de :" .round($surface,2);
    $saisie = readline("\n Voulez vous faire un autre calcul (oui/non) ?");

        if(strtolower($saisie) == "non"){
            echo "Au revoir !! \n";
            break;
        }
        elseif(strtolower($saisie) !== "oui"){
            echo "\n Merci de rentrer une réponse valide \n";
            $saisie = readline("\n Voulez vous faire un autre calcul (oui/non) ?");
        }
    }while(strtolower($saisie) == "oui");
}

// ----------------------------------------------------EXERCICE 2 ----------------------------------------------------------
function Menu() {
    echo "\nChoisissez une opération (tapez 1, 2, 3 ou 4) :\n";
    echo "1. Addition \n";
    echo "2. Soustraction \n";
    echo "3. Multiplication \n";
    echo "4. Division \n";
}

function choixNombre($message) {
    do {
        $nombre = readline($message);
        // le is_numeric sert à être sur que le nombre entré est bien un nombre.
        if (is_numeric($nombre)) {
            return ($nombre);
        } else {
            echo "Veuillez entrer un nombre valide.\n";
        }
    } while (true);
}

function choixOperation() {
    do {
        Menu();
        $choix = readline("Entrez le numéro de l'opération : ");
        if (array($choix, ['1', '2', '3', '4'])) {
            return $choix;
        } else {
            echo "Veuillez chisir une opération en entrant un numéro entre 1 et 4.\n";
        }
    } while (true);
}

function calculer($nombre1, $nombre2, $operation) {
    switch ($operation) {
        case '1':
            return $nombre1 + $nombre2;
        case '2':
            return $nombre1 - $nombre2;
        case '3':
            return $nombre1 * $nombre2;
        case '4':
            if ($nombre2 != 0) {
                return $nombre1 / $nombre2;
            } else {
                echo "Erreur pn ne divise pas par 0\n";
                return null;
            }
    }
}


// ----------------------------------------------------EXERCICE 3------------------------------------------------------------------------------





