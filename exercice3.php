<?php


//  Cet exercice étant composé entièrement de fonction, je n'ai pas trouvé utile d'utiliser le fonction.php. Tout est donc sur cet index.

$eleves = [];
// création d'un tableau vide pour venir ajouter les éleves dedans par la suite.
function nombreEleves() {
    do {
        $nombreEleves = readline("Entrez le nombre d'élèves dans la classe : ");
        if (is_numeric($nombreEleves) && $nombreEleves > 0) {
            return intval($nombreEleves);
        } else {
            echo "Veuillez entrer un nombre entier positif.\n";
        }
    } while (true);
}
// première fonction pour entrer manuellement le nombre d'élève dans la classe. Avec une boucle do pour la répéter si le nombre est invalide.

function note(&$eleves) {
    $nombreEleves = nombreEleves();
    for ($i = 0; $i < $nombreEleves; $i++) {
        $nom = readline("Entrez le nom de l'élève " . ($i + 1) . " : ");
        do {
            $note = readline("Entrez la note de $nom : ");
            if (is_numeric($note) && $note >= 0 && $note <= 20) {
                $eleves[$nom][] = floatval($note);
                break;
            } else {
                echo "Veuillez entrer une note valide entre 0 et 20.\n";
            }
        } while (true);
    }
}
// deuxième fonction pour ajouter les notes des élèves. Dans une boucle for pour incrémenté de 1 le numéro de l'élève en fonction du nombre indiqué.
// avec aussi une boucle do while pour répéter la fonction tant que la note n'est pas valide. 

function ajouterNoteEleve(&$eleves) {
    $nom = readline("Entrez le nom de l'élève : ");
    if (isset($eleves[$nom])) {
        do {
            $note = readline("Entrez la nouvelle note pour $nom : ");
            if (is_numeric($note) && $note >= 0 && $note <= 20) {
                $eleves[$nom][] = floatval($note);
                break;
            } else {
                echo "Veuillez entrer une note valide entre 0 et 20.\n";
            }
        } while (true);
    } else {
        echo "L'élève $nom n'existe pas.\n";
    }
}
// troisièmre fonction pour ajouter une note à un élève. Avec une boucle do while pour répeter en cas de note incorrecte, et un if/else pour arrêter si le nom de l'élève saisis n'existe pas.

function supprimerEleve(&$eleves) {
    $nom = readline("Entrez le nom de l'élève à supprimer : ");
    if (isset($eleves[$nom])) {
        unset($eleves[$nom]);
        echo "L'élève $nom a été supprimé.\n";
    } else {
        echo "L'élève $nom n'existe pas.\n";
    }
}
// quatrième fonction cette fois pour supprimer un eleve. une fois le nom entré dans le readline, un if ou un else determine si l'élève existe ou pas. Si il existe (le isset détermine si la variable existe bien), le unset supprimera l'éleve. Si il n'existe pas, le else renverra un message d'erreur. 

function moyenneClasse($eleves) {
    $totalNotes = 0;
    $nombreNotes = 0;
    foreach ($eleves as $notes) {
        $totalNotes += array_sum($notes);
        $nombreNotes += count($notes);
    }
    if ($nombreNotes == 0) {
        return 0;
    }
    return $totalNotes / $nombreNotes;
}

// 5eme fonction pour calculer la moyenne de la classe. Ici ce sera un simple foreach pour parcourir le tableau, compter le nombre de note, et renvoyer le resultat demandé. Le array_sum calcul la somme des valeurs du tableau. le if retourne 0 si il n'y a aucune note enregistré.

function trouverNoteExtremes($eleves) {
    $noteMax = -1;
    $noteMin = 21;
    $eleveMax = "";
    $eleveMin = "";
    foreach ($eleves as $nom => $notes) {
        foreach ($notes as $note) {
            if ($note > $noteMax) {
                $noteMax = $note;
                $eleveMax = $nom;
            }
            if ($note < $noteMin) {
                $noteMin = $note;
                $eleveMin = $nom;
            }
        }
    }
    return ["max" => ["nom" => $eleveMax, "note" => $noteMax], "min" => ["nom" => $eleveMin, "note" => $noteMin]];
}

// une sixième fonction pour trouver la plus grande et la plus petite note de la classe. Je déclare mes 4 variables, pour ensuite utiliser un foreach pour parcourir le tableau. je declare dans le foreach que $eleves correspond à $nom => $notes. un premier if je declare que si la note est supérieur à $noteMax, $notemax sera égal à $note, et que $elevemax=$nom, ce qui me sortira le nom de l'élève qui a la meilleur note. Je fais ensuite l'inverse dans un deuxième if pour déterminer qui a la note la plus basse. Un simple return me permet ensuite de renvoyer les resultats.

function elevesAuDessusMoyenne($eleves, $moyenneClasse) {
    foreach ($eleves as $nom => $notes) {
        $moyenneEleve = array_sum($notes) / count($notes);
        if ($moyenneEleve > $moyenneClasse) {
            echo "$nom avec une moyenne de $moyenneEleve\n";
        }
    }
}
// pour cette septième fonction, un simple foreach me permet de parcourir le tableau, en précisant que $éleves correspond à $nom => notes). Une division de la sommes des notes par le nombre de note me permet d'avoir la moyenne de l'eleve. Il me suffit de la comparer avec la moyenne de classe pour pouvoir afficher quel éleve est au dessus de la moyenne.

function trierEtAfficherTableau($eleves, $ordre = "croissant") {
    $tableauMoyennes = [];
    foreach ($eleves as $nom => $notes) {
        $tableauMoyennes[$nom] = array_sum($notes) / count($notes);
    }
    if ($ordre == "croissant") {
        asort($tableauMoyennes);
    } else {
        arsort($tableauMoyennes);
    }
    foreach ($tableauMoyennes as $nom => $moyenne) {
        echo "$nom : $moyenne\n";
    }
}
// cette huitième fonction me permet de trier et afficher le tableau des élèves et de leurs notes. Je précise dans les paramètre que je veux le classmeent par ordre croissant. Je crée un tableau vide pour y rentrer les moyennes des élèves. Je parcours et manipule mon tableau grace à un foreach. Si l'ordre demandé est croissant, asort me permet de sortir le resultat par ordre croissant. Si ce n'est pas croissant, arsort me permet de sortir le résultat par ordre décroissant. Un autre foreach me permet de retourner le nom et la moyenne des élèves.

function tableau($eleves) {
    foreach ($eleves as $nom => $notes) {
        $notesTab = implode(", ", $notes);
        echo "$nom : $notesTab\n";
    }
}
// neuvième fonction qui me permet d'afficher le tableau des notes des élèves. Implode me permet de rassembler les éléments d'un tableau en chaine de caractère.


function menu() {
    echo "\nMenu :\n";
    echo "1. Ajouter une note\n";
    echo "2. Supprimer un élève\n";
    echo "3. Calculer la moyenne de la classe\n";
    echo "4. Trouver la note la plus élevée et la note la plus basse\n";
    echo "5. Afficher les élèves au-dessus de la moyenne générale\n";
    echo "6. Trier et afficher le tableau des notes\n";
    echo "7. Afficher le tableau des notes\n";
    echo "8. Quitter\n";
}
// simple fonction pour afficher un menu à choix multiple pour les utilisateurs.

function gestionNotes() {
    global $eleves;
    note($eleves);
    do {
        Menu();
        $choix = readline("Entrez votre choix : ");
        switch ($choix) {
            case '1':
                ajouterNoteEleve($eleves);
                break;
            case '2':
                supprimerEleve($eleves);
                break;
            case '3':
                $moyenneClasse = moyenneClasse($eleves);
                echo "La moyenne de la classe est de $moyenneClasse\n";
                break;
            case '4':
                $extremes = trouverNoteExtremes($eleves);
                echo "Note la plus élevée : " . $extremes["max"]["nom"] . " avec " . $extremes["max"]["note"] . "\n";
                echo "Note la plus basse : " . $extremes["min"]["nom"] . " avec " . $extremes["min"]["note"] . "\n";
                break;
            case '5':
                $moyenneClasse = moyenneClasse($eleves);
                echo "Élèves avec des notes au-dessus de la moyenne ($moyenneClasse) :\n";
                elevesAuDessusMoyenne($eleves, $moyenneClasse);
                break;
            case '6':
                $ordre = readline("Entrez l'ordre de tri (croissant/decroissant) : ");
                if ($ordre !== "croissant" && $ordre !== "decroissant") {
                    echo "Ordre de tri invalide. Utilisation de l'ordre croissant par défaut.\n";
                    $ordre = "croissant";
                }
                trierEtAfficherTableau($eleves, $ordre);
                break;
            case '7':
                tableau($eleves);
                break;
            case '8':
                echo "Au revoir !\n";
                exit;
            default:
                echo "Choix invalide, veuillez réessayer.\n";
        }
    } while (true);
}
// dernière fonction pour la gestion des notes et du tableau en général. Un switch me permet ici de proposer un algo différent selon le choix effectué par l'utilisateur dans le menu.

gestionNotes();
