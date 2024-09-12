<?php

function afficherFormulaire($auto_type="", $auto_jour_semaine="", $auto_mutuelle=""){

    echo'
        <html>
        <head></head>
        
        <body>
        <h2> Calculer le prix de votre heure de conduite !</h2>
        <form method="get" action="Ex02_AutoEcole_1Fichier.php">
    
            Type de permis : <input type="radio" name="auto_type" value="A" ' . (!$auto_type || $auto_type == "A" ? "checked" : "") . '>A
                             <input type="radio" name="auto_type" value="B" '.($auto_type == "B" ? "checked" : "") . '> B
    
            <br> <br>
    
        Jour de la semaine : <select name="auto_jour_semaine" required>
                <option value="Lundi"' . ($auto_jour_semaine == "Lundi" ? "selected" : "") . '> Lundi </option>
                <option value="Mardi"' . ($auto_jour_semaine == "Mardi" ? "selected" : "") . '> Mardi </option>
                <option value="Mercredi"' . ($auto_jour_semaine == "Mercredi" ? "selected" : "") . '> Mercredi </option>
                <option value="Jeudi"' . ($auto_jour_semaine == "Jeudi" ? "selected" : "") . '> Jeudi </option>
                <option value="Vendredi"' . ($auto_jour_semaine == "Vendredi" ? "selected" : "") . '> Vendredi </option>
                <option value="Samedi"' . ($auto_jour_semaine == "Samedi" ? "selected" : "") . '> Samedi </option>
            </select>
    
                <br> <br>
    
        Mutuelle :<input type="radio" name="auto_mutuelle" value="oui"' . (!$auto_mutuelle || $auto_mutuelle == "oui" ? "checked" : "") .'> Oui
                  <input type="radio" name="auto_mutuelle" value="non"' . ($auto_mutuelle == "non" ? "checked" : "") .'> Non
    
                <br> <br>
    
            <button type="submit" name="auto_button" value="demande"> Envoyer </button>
    
        </form>
        </body>
    
    </html>';
}


if (isset($_GET['auto_button'])) {

    // On declare les variables envoyees par le client en php

    $auto_type = $_GET["auto_type"];
    $auto_jour_semaine = $_GET["auto_jour_semaine"];
    $auto_mutuelle  = $_GET["auto_mutuelle"];
    afficherFormulaire($auto_type, $auto_jour_semaine, $auto_mutuelle);


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

    $prix = $prixHoraire * (100 - $coeffJour) / 100  * (100-$reduction_Mutuelle) / 100;
    echo "le prix d'une séance de permis $messageTypePermis le $messageJour $MessageMutuelle mutuelle est de $prix €";

}
else
    afficherFormulaire();