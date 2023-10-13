<?php
session_start();

$projets = [
    [
        "nom" => "Projet A",
        "description" => "Description Du Projet A",
        "activites" => [
            ["nom" => "Activite 1", "description" => "Description de l'Activite 1", "date" => "23-02-2023"],
            ["nom" => "Activite 2", "description" => "Description de l'Activite 2", "date" => "23-03-2023"],
            ["nom" => "Activite 3", "description" => "Description de l'Activite 3", "date" => "23-04-2023"]
        ],
        "partenaire" => "Simplon-Sénégal"
    ],
    [
        "nom" => "Projet B",
        "description" => "Description Du Projet B",
        "activites" => [
            ["nom" => "Activite 4", "description" => "Description de l'Activite 4", "date" => "23-05-2023"],
            ["nom" => "Activite 5", "description" => "Description de l'Activite 5", "date" => "23-06-2023"]
        ],
        "partenaire" => "Orange Digital Center"
    ],
    [
        "nom" => "Projet C",
        "description" => "Description Du Projet C",
        "activites" => [
            ["nom" => "Activite 6", "description" => "Description de l'Activite 6", "date" => "23-08-2023"]
        ],
        "partenaire" => "GaÏnde-2000"
    ],
];
// Création de la variable session $projets pour que je puisse le garder dans le tableau
$_SESSION["projets"] = $projets;

// Récupération des données apartir de la formulaire 
if (isset($_POST["ENVOYER"])) {
    $envoyer = $_POST["ENVOYER"];
    $nomProjet = $_POST["nomProjet"];
    $nomActivite = $_POST["nom"];
    $descriptionActivite = $_POST["description"];
    $dateActivite = $_POST["date"];
    $voirDetails = $_POST["details"];

// Création d'une session pour stocker les variables récuperer depuis le formulaire

    $_SESSION["nomProjet"] = $nomProjet;
    $_SESSION["nomActivite"] = $nomActivite;
    $_SESSION["descriptionActivite"] = $descriptionActivite;
    $_SESSION["date"] = $dateActivite;
    $_SESSION["details"] = $voirDetails;

    // Stoker la variable New Activity dans une session dont on aura la-bas les nouveaux activity
    $_SESSION["newactivity"] = [];
    // Stocker la variable details
    $_SESSION["viewDetails"] = $voirDetails;

header("location:resultat.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="details.php?id=1">Voir les détails du projet</a>
    <title>Projet</title>
</head>
<body>
<style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }

        form {
            width: 50%;
            margin: 0 auto;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #000;
            color: #fff;
            cursor: pointer;
        }
    </style>
    <form action="" method="POST">
        <select name="nomProjet" id="projet">
            <?php
            foreach ($projets as $projet) {
                echo '<option value="' . $projet['nom'] . '">' . $projet['nom'] . '</option><br>';
            }
            ?>
            <input type="text" name="nom" placeholder="nom" required>
            <input type="text" name="description" placeholder="description" >
            <input type="date" name="date" placeholder="date d'activités" >
        </select>
        <input type="submit" name="ENVOYER" value="ENVOYER" required><br>
    </form>
</body>
</html>