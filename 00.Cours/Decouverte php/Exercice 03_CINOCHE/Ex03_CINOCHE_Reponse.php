<?php

//  ----   On declare en php les variables envoyer par le client
$jour_semaine = $_POST["jour_semaine"];
$type_tarif = $_POST["type_tarif"];
$time = $_POST["time"];

$Film_3D = isset($_POST["Film_3D"]);
$Coupon = isset($_POST["Coupon"]);


// On vérifie si l'utilisateur à sélectionner
// Le Lundi ou l'heure 11h10, si c'est le cas
// L'on applique le tarif Promo_Réduit '5'
if ($jour_semaine == "1" || $time == "11:10"){
    $type_tarif = "4";
}

//
switch ($type_tarif) {
    case '1': // Plein Tarif
        $prix = 8.70;
        break;
    case '2': // Tarif Etudiant et Mineur
        $prix = 5.90;
        break;
    case '3': // Tarif réduit autre
        $prix = 6.90;
        break;
    case '4': // Tarif special CE
    case '5': // Promo_Réduit
        $prix = 5.20;
        break;
    default:
        throw new Exception("Erreur d'un type de tarif");
}

if ($Coupon && $type_tarif != "4" ){
    $prix -= 1;
}
elseif ($Film_3D){
    $prix += 1.50;
}


echo "Vous payerez votre place: ", $prix, " euros";

