<?php

function afficherFormulaire($jour_semaine="",$time="",$type_tarif="", $Coupon="", $Film3D=""){

    echo '
    <html>
    <head>

    </head>

    <body>

    <h1>Cinoche</h1>

    <h4>Tarif</h4>
    <form method="post" action="Ex03_CINOCHE_1Fichier.php">
        Jour de la semaine : <select name="jour_semaine">
            <option value="1"'.($jour_semaine=="1" ? "selected" : "").'>Lundi</option>
            <option value="2"'.($jour_semaine=="2" ? "selected" : "").'>Mardi</option>
            <option value="3"'.($jour_semaine=="3" ? "selected" : "").'>Mercredi</option>
            <option value="4"'.($jour_semaine=="4" ? "selected" : "").'>Jeudi</option>
            <option value="5"'.($jour_semaine=="5" ? "selected" : "").'>Vendredi</option>
            <option value="6"'.($jour_semaine=="6" ? "selected" : "").'>Samedi</option>
            <option value="7"'.($jour_semaine=="7" ? "selected" : "").'>Dimanche</option>
        </select>

        <br> <br>

    Heure : <input type="time" name="time">

        <br> <br>

    Type de ticket :     <input type="radio" name="type_tarif" value="1"'.(!$type_tarif || $type_tarif == "1" ? "checkbox" : "").'>Plein Tarif : 8,70 Euros <br>
        Type de ticket : <input type="radio" name="type_tarif" value="2"'.($type_tarif == "2" ? "checkbox" : "").' >  Etudiant ou mineur : 5,90 Euros <br>
        Type de ticket : <input type="radio" name="type_tarif" value="3"'.($type_tarif == "3" ? "checkbox" : "").' >  Tarif reduit autre : 6,90 euros <br>
        Type de ticket : <input type="radio" name="type_tarif" value="4"'.($type_tarif == "4" ? "checked" : "") .'>  Tarif special CE : 5,20 Euros <br>

        <br>

        <input type="checkbox" name="Film_3D"> Majoration Film 3D : 1,50 Euro <br>
        <input type="checkbox" name="Coupon"> Coupon reduction : - 1 Euro <br>

        <br>

        <input type="submit" name="Price_button" value="Decouvrir le prix de ma place">
    </form>

    </body>

</html>';

}

if(isset($_POST["Price_button"])){

//  ----   On declare en php les variables envoyer par le client
    $jour_semaine = $_POST["jour_semaine"];
    $type_tarif = $_POST["type_tarif"];
    $time = $_POST["time"];

    $Film_3D = isset($_POST["Film_3D"]);
    $Coupon = isset($_POST["Coupon"]);
    afficherFormulaire($jour_semaine,$time,$type_tarif,$Coupon,$Film_3D);

// On vérifie si l'utilisateur à sélectionner
// Le Lundi ou l'heure 11h10, si c'est le cas
// L'on applique le tarif Promo_Réduit '5'
    if ($jour_semaine == "1" || $time == "11:10") {
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

    if ($Coupon && $type_tarif != "4") {
        $prix -= 1;
    } elseif ($Film_3D) {
        $prix += 1.50;
    }

    echo "Vous payerez votre place: ", $prix, " euros";
}
else
    afficherFormulaire();