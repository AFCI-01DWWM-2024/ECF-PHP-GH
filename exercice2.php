<?php

require "fonction.php";

do {
    $nombre1 = choixNombre("Entrez le premier nombre : ");
    $nombre2 = choixNombre("Entrez le deuxième nombre : ");
    $operation = choixOperation();

    $resultat = calculer($nombre1, $nombre2, $operation);

    if ($resultat !== null) {
        switch ($operation) {
            case '1':
                echo "Résultat : $nombre1 + $nombre2 = $resultat\n";
                break;
            case '2':
                echo "Résultat : $nombre1 - $nombre2 = $resultat\n";
                break;
            case '3':
                echo "Résultat : $nombre1 * $nombre2 = $resultat\n";
                break;
            case '4':
                echo "Résultat : $nombre1 / $nombre2 = $resultat\n";
                break;
        }
    }

    $continuer = readline("Voulez-vous effectuer un autre calcul ? (oui/non) : ");
} while (strtolower($continuer) === "oui");
// la boucle while se répétera tant que l'utilisateur entrera "oui" dans le readline. 

echo "Au revoir !\n";