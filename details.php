<?php

session_start();

    $voirDetails =  $_SESSION["details"];
    $projets = $_SESSION["projets"];
    $nomProjet = $_SESSION["nomProjet"];
    $nomActivite = $_SESSION["nomActivite"];
    $descriptionActivite = $_SESSION["descriptionActivite"];

//   var_dump($nomProjet);

if ((isset($_SESSION["nomActivite"])) && (isset($_SESSION["descriptionActivite"]))) {

// Recherche du projet sélectionné dans le tableau $projets
        foreach ($projets as $projet) {

            if ($projet["nom"] === $_SESSION["nomProjet"]) {

                echo "Le nom du projet: " . $projet["nom"] . "<br>";

                echo "La description du projet: " . $projet["description"] . "<br>";

                echo "Les partenaires de ce projet: " . $projet["partenaire"] . "<br>";
    
                echo "Activités existantes :<br>";

                foreach ($projet["activites"] as $activite) {

                    echo "Le nom de l'activité est : " . $activite['nom'] . "<br>";

                    echo "La description de l'activité : " . $activite['description'] . "<br>";

                    echo "La date de l'activité : " . $activite['date'] . "<br>";

                    echo "<br>";
                }
            }
        }
    }
?>
