<?php

// On declare en php les variables envoyer par le client
$jour_semaine = $_POST["jour_semaine"];
$type_tarif = $_POST["type_tarif"];
$time = $_POST["time"];

if (isset($_POST["Film_3D"])){
    $Film_3D = true;
}
else{
    $Film_3D = false;
}

if (isset($_POST["Coupon"])){
    $Coupon = true;
}
else{
    $Coupon = false;
}




if ($jour_semaine == "1" || $time == "11:10"){
    $type_tarif = "4";
}



switch ($type_tarif) {
    case '1':
        $prix = 8.70;
        break;
    case '2':
        $prix = 5.90;
        break;
    case '3':
        $prix = 6.90;
        break;
    case '4':
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

