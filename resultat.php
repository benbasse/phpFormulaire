<?php
session_start();

// Récupération des données depuis la session
$nomProjet = $_SESSION["nomProjet"];
$nomActivite = $_SESSION["nomActivite"];
$descriptionActivite = $_SESSION["descriptionActivite"];
$dateActivite = $_SESSION["date"];
$projets = $_SESSION["projets"];

// Création d'une session pour stocker les variables récuperer depuis le formulaire

$nomProjet = $_SESSION["nomProjet"];
$nomActivite = $_SESSION["nomActivite"];
$descriptionActivite = $_SESSION["descriptionActivite"];
$dateActivite = $_SESSION["date"];

// Stoker la variable New Activity dans une session dont on aura la-bas les nouveaux activity
    $_SESSION["newactivity"] = [];

    // Vérification si l'activités existe dans projets si non il peut saisir le nom description et la date 
    foreach ($projets as $projet) {

        if ($projet['nom'] == $nomProjet ){

            $_SESSION["newactivity"] = [

                'nom' => $_SESSION["nomActivite"],

                'description' => $_SESSION["descriptionActivite"],

                'date' => $_SESSION["date"]
            ];
            //var_dump($_SESSION["newactivity"]);

            $_SESSION["projets"]["activites"][] = $_SESSION["newactivity"];

            // var_dump($_SESSION["projets"]);
        }
    }

$_SESSION["errorMessage"] = [];

    if (empty($nomActivite) || !preg_match("/^[A-Za-z '-]+$/", $nomActivite)) {
        $errorMessage[] = "Le nom est obligatoire. Le nom doit contenir uniquement des lettres et des espaces.";
    }

    if (empty($descriptionActivite) || !preg_match("/^[A-Za-z '-]+$/", $descriptionActivite)) {
        $errorMessage[] = "La description est obligatoire. La description doit contenir uniquement des lettres et des espaces.";
    }

        // Vérification du poids
        if (empty($dateActivite)) {
            $errorMessage[] = "La date est obligatoire.";
        }
    


// Affichage des erreurs si le nom et la description ne sont pas correctement écrit
if (!empty($errorMessage)) {

        foreach ($errorMessage as $error) {

            echo $error . "<br>";
        }
    } else {
        // Récupération du nom du projet sélectionné depuis la session 

if (isset($_SESSION["nomProjet"])) {

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

            // Afficher les nouvelles activités insérées (si elles existent)
            if (!empty($_SESSION["newactivity"])) {

                echo "Nouvelles activités insérées :<br>";

                echo "Le nom de l'activité est : " . $_SESSION["newactivity"]["nom"] . "<br>";

                echo "La description de l'activité : " . $_SESSION["newactivity"]["description"] . "<br>";

                echo "La date de l'activité : " . $_SESSION["newactivity"]["date"] . "<br>";
            }
        }
    }
}

}
?>