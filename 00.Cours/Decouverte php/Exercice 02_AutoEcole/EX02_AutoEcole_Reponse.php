<?php

// On declare les variables envoyees par le client en php

$auto_type = $_GET["auto_type"];
$auto_jour_semaine = $_GET["auto_jour_semaine"];
$auto_mutuelle  = $_GET["auto_mutuelle"];


// On initie la variable du prix horaire en fonction
// du type de permis selectionner
switch ($auto_type) {
    case "A" :
        $prixHoraire = 45;
        $messageTypePermis = "A";
        break;
    case "B" :
        $prixHoraire = 50;
        $messageTypePermis = "B";
        break;
    default:
        throw new Exception("Erreur dans le type");
        break;
}

// Le prix est modifier en fonction du jour de la semaine selectionne
switch ($auto_jour_semaine) {
    case "Lundi":
        $coeffJour = 0;
        $messageJour="Lundi";
        break;
    case "Mardi":
        $coeffJour = 10;
        $messageJour="Mardi";
        break;
    case "Mercredi":
        $coeffJour = 20;
        $messageJour="Mercredi";
        break;
    case "Jeudi":
        $coeffJour = 5;
        $messageJour="Jeudi";
        break;
    case "Vendredi":
        $coeffJour = 20;
        $messageJour="Vendredi";
        break;
    case "Samedi":
        $coeffJour = 0;
        $messageJour="Samedi";
        break;
    default:
        throw new Exception("Erreur dans le jour");
        break;
}

// Prix avec reduction si etudiant
switch ($auto_mutuelle) {
    case "oui" :
        $reduction_Mutuelle = 8;
        $MessageMutuelle="avec";
        break;
    case "non" :
        $reduction_Mutuelle = 0;
        $MessageMutuelle="sans";
        break;
    default:
        throw new Exception("Erreur dans le type");
        break;
}

$prix = $prixHoraire * (100-$coeffJour) / 100  * (100-$reduction_Mutuelle) / 100;
echo "le prix d'une séance de permis $messageTypePermis le $messageJour $MessageMutuelle mutuelle est de $prix €";


